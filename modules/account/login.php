<?php
require_once 'includes/FluxSession.php';

if (!defined('FLUX_ROOT')) exit;

if (Flux::config('UseLoginCaptcha') && Flux::config('EnableReCaptcha')) {
    $recaptcha = Flux::config('ReCaptchaPublicKey');
    $theme = Flux::config('ReCaptchaTheme');
}

$title = Flux::message('LoginTitle');
$loginLogTable = Flux::config('FluxTables.LoginLogTable');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log('Login Attempt - Validating CSRF Token');
    if (!validateCSRFToken($_POST['csrf_token'])) {
        error_log('CSRF Token Validation Failed');
        die('CSRF token validation failed');
    }
    error_log('CSRF Token Validation Successful');
    
    if (count($_POST)) {
        $serverGroupName = $params->get('server');
        $username = $params->get('username');
        $password = $params->get('password');
        $code     = $params->get('security_code');
        
        try {
            $session->login($serverGroupName, $username, $password, $code);
            // After successful login, regenerate CSRF token
            regenerateCSRFToken();
            
            // Log successful login with CSRF token
            error_log(sprintf(
                "Successful login - User: %s, IP: %s, CSRF Token: %s at %s",
                $username,
                $_SERVER['REMOTE_ADDR'],
                $_SESSION['csrf_token'],
                date('Y-m-d H:i:s')
            ));
            
            // Log token expiration time
            error_log(sprintf(
                "Token expires at: %s (in %d seconds)",
                date('Y-m-d H:i:s', $_SESSION['token_expiry']),
                $_SESSION['token_expiry'] - time()
            ));
            
            $returnURL = $params->get('return_url');
            
            if ($session->loginAthenaGroup->loginServer->config->getUseMD5()) {
                $password = Flux::hashPassword($password);
            }
            
            $sql  = "INSERT INTO {$session->loginAthenaGroup->loginDatabase}.$loginLogTable ";
            $sql .= "(account_id, username, password, ip, error_code, login_date) ";
            $sql .= "VALUES (?, ?, ?, ?, ?, NOW())";
            $sth  = $session->loginAthenaGroup->connection->getStatement($sql);
            $sth->execute(array($session->account->account_id, $username, $password, $_SERVER['REMOTE_ADDR'], null));
            
            if ($returnURL) {
                $this->redirect($returnURL);
            }
            else {
                $this->redirect();
            }
        }
        catch (Flux_LoginError $e) {
            if ($username && $password && $e->getCode() != Flux_LoginError::INVALID_SERVER) {
                $loginAthenaGroup = Flux::getServerGroupByName($serverGroupName);
    
                $sql = "SELECT account_id FROM {$loginAthenaGroup->loginDatabase}.login WHERE ";
                
                if (!$loginAthenaGroup->loginServer->config->getNoCase()) {
                    $sql .= "CAST(userid AS BINARY) ";
                } else {
                    $sql .= "userid ";
                }
                
                $sql .= "= ? LIMIT 1";
                $sth = $loginAthenaGroup->connection->getStatement($sql);
                $sth->execute(array($username));
                $row = $sth->fetch();
    
                if ($row) {
                    $accountID = $row->account_id;
                    
                    if ($loginAthenaGroup->loginServer->config->getUseMD5()) {
                        $password = Flux::hashPassword($password);
                    }
    
                    $sql  = "INSERT INTO {$loginAthenaGroup->loginDatabase}.$loginLogTable ";
                    $sql .= "(account_id, username, password, ip, error_code, login_date) ";
                    $sql .= "VALUES (?, ?, ?, ?, ?, NOW())";
                    $sth  = $loginAthenaGroup->connection->getStatement($sql);
                    $sth->execute(array($accountID, $username, $password, $_SERVER['REMOTE_ADDR'], $e->getCode()));
                }
            }
            
            switch ($e->getCode()) {
                case Flux_LoginError::UNEXPECTED:
                    $errorMessage = Flux::message('UnexpectedLoginError');
                    break;
                case Flux_LoginError::INVALID_SERVER:
                    $errorMessage = Flux::message('InvalidLoginServer');
                    break;
                case Flux_LoginError::INVALID_LOGIN:
                    $errorMessage = Flux::message('InvalidLoginCredentials');
                    break;
                case Flux_LoginError::BANNED:
                    $errorMessage = Flux::message('TemporarilyBanned');
                    break;
                case Flux_LoginError::PERMABANNED:
                    $errorMessage = Flux::message('PermanentlyBanned');
                    break;
                case Flux_LoginError::IPBANNED:
                    $errorMessage = Flux::message('IpBanned');
                    break;
                case Flux_LoginError::INVALID_SECURITY_CODE:
                    $errorMessage = Flux::message('InvalidSecurityCode');
                    break;
                case Flux_LoginError::PENDING_CONFIRMATION:
                    $errorMessage = Flux::message('PendingConfirmation');
                    break;
                default:
                    $errorMessage = Flux::message('CriticalLoginError');
                    break;
            }
        }
    }
}

if (isset($_GET['expired'])) {
    $errorMessage = 'Your session has expired. Please login again.';
}

$serverNames = $this->getServerNames();
?>
