<?php
if (!defined('FLUX_ROOT')) exit;

if (!$session->isLoggedIn()) {
    header('HTTP/1.1 401 Unauthorized');
    exit(json_encode(['success' => false, 'message' => 'Session expired']));
}

// Verify CSRF token
if (!$session->validateToken($_SERVER['HTTP_X_CSRF_TOKEN'])) {
    header('HTTP/1.1 403 Forbidden');
    exit(json_encode(['success' => false, 'message' => 'Invalid token']));
}

// Only accept JSON POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || 
    $_SERVER['CONTENT_TYPE'] !== 'application/json') {
    header('HTTP/1.1 400 Bad Request');
    exit(json_encode(['success' => false, 'message' => 'Invalid request']));
}

// Get JSON data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    header('HTTP/1.1 400 Bad Request');
    exit(json_encode(['success' => false, 'message' => 'Invalid JSON']));
}

try {
    $amount = floatval($data['amount']);
    $credits = floor($amount / Flux::config('CreditExchangeRate'));
    
    // Begin transaction
    $sth = $server->connection->beginTransaction();
    
    // Insert donation record
    $sql = "INSERT INTO {$server->loginDatabase}.donations (account_id, amount, credits, transaction_id, payment_status, create_date)
            VALUES (?, ?, ?, ?, ?, NOW())";
            
    $sth = $server->connection->getStatement($sql);
    $sth->execute(array(
        $session->account->account_id,
        $amount,
        $credits,
        $data['orderID'],
        $data['status']
    ));
    
    // Add credits to account
    $sql = "UPDATE {$server->loginDatabase}.login SET credits = credits + ? WHERE account_id = ?";
    $sth = $server->connection->getStatement($sql);
    $sth->execute(array($credits, $session->account->account_id));
    
    // Commit transaction
    $server->connection->commit();
    
    // Return success response
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'transactionId' => $data['orderID'],
        'message' => 'Payment processed successfully'
    ]);
} catch (Exception $e) {
    // Rollback on error
    $server->connection->rollback();
    
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode([
        'success' => false,
        'message' => 'Error processing payment: ' . $e->getMessage()
    ]);
}