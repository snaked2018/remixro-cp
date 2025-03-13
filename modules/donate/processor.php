<?php
if (!defined('FLUX_ROOT')) exit;

// Set JSON response headers
header('Content-Type: application/json');

try {
    // Check if user is logged in
    if (!$session->isLoggedIn()) {
        throw new Exception('Session expired. Please login again.', 401);
    }

    // Verify CSRF token from header
    $requestToken = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;
    if (!$requestToken || !$session->validateToken($requestToken)) {
        throw new Exception('Invalid security token', 403);
    }

    // Get transaction table name from config
    $txnLogTable = Flux::config('FluxTables.TransactionTable');

    // Get and validate JSON input
    $jsonInput = file_get_contents('php://input');
    $data = json_decode($jsonInput, true);

    if (!$data) {
        throw new Exception('Invalid JSON data', 400);
    }

    // Process payment
    $amount = floatval($data['amount']);
    $credits = floor($amount / Flux::config('CreditExchangeRate'));
    
    // Begin transaction
    $server->connection->beginTransaction();
    
    try {
        // Insert donation record
        $sql = "INSERT INTO {$server->loginDatabase}.{$txnLogTable} (
            account_id,
            server_name,
            mc_gross,
            mc_currency,
            txn_id,
            payment_status,
            payer_email,
            payment_date,
            credits,
            process_date
        ) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?, NOW())";
                
        $sth = $server->connection->getStatement($sql);
        $sth->execute([
            $session->account->account_id,
            $session->loginAthenaGroup->serverName,
            $amount,
            $data['currency'],
            $data['orderID'],
            $data['status'],
            $data['email'],
            $credits
        ]);
        
        // Add credits to account
        $sql = "UPDATE {$server->loginDatabase}.login SET 
                credits = credits + ?,
                last_donation_date = NOW()
                WHERE account_id = ?";
                
        $sth = $server->connection->getStatement($sql);
        $sth->execute([$credits, $session->account->account_id]);
        
        // Commit transaction
        $server->connection->commit();
        
        // Return success response
        echo json_encode([
            'success' => true,
            'transactionId' => $data['orderID'],
            'message' => 'Payment processed successfully',
            'credits' => $credits,
            'redirectUrl' => $this->url('donate', 'complete', ['txn' => $data['orderID']])
        ]);

    } catch (Exception $e) {
        // Rollback on error
        $server->connection->rollBack();
        throw new Exception('Database error: ' . $e->getMessage(), 500);
    }

} catch (Exception $e) {
    $statusCode = $e->getCode() ?: 500;
    http_response_code($statusCode);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage(),
        'code' => $statusCode
    ]);
}