<?php



/**
 * Description of SessionManager
 *
 * @author wadmin
 */
class SessionManager
{


    const MAX_SECONDS_INACTIVITY = 3600 * 300;

    public static function isRoleAllowedInAction(array $actionAllowedRoles)
    {
        self::iniciarSesion();
        if (isset($_SESSION["roleId"])) {

            return in_array($_SESSION["roleId"], $actionAllowedRoles);
        }
        return false;
    }
    //5- Modifica el método cerrarSesion de SessionManager para que elimine la cookie   'pantalon' cuando se cierre la sesión (2 puntos)
    public static function cerrarSesion()
    {
        self::iniciarSesion();

        session_destroy();

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    }

    public static function iniciarSesion(): bool
    {
        $iniciada = true;
        if (session_status() !== PHP_SESSION_ACTIVE) {
            $iniciada = session_start();
        }

        return $iniciada;
    }

    public static function isUserLoggedIn()
    {
        $autenticado = self::iniciarSesion() && isset($_SESSION["userId"]) && isset($_SESSION["roleId"]) && isset($_SESSION["ultimoAcceso"]);
        return $autenticado && self::isUserActive();
    }

    //    h) Establece un tiempo máximo de inactividad con el servidor tras el cual se cerrará la sesión de forma automática. Actualiza el tiempo de acceso, siempre que se invoque una action con el rol permitido. (1 punto)
    public static function isUserActive(): bool
    {
        $active = false;
        $actual_time = time();
        $diff = $actual_time - $_SESSION["ultimoAcceso"];
        if ($diff < SessionManager::MAX_SECONDS_INACTIVITY) {
            $active = true;
        } else {
            self::cerrarSesion();
        }

        return $active;
    }

    public static function updateLastAccess()
    {
        $_SESSION["ultimoAcceso"] = time();
    }
}
