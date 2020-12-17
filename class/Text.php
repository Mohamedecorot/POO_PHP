<?php
class Text{

    private static $suffix = " €";
    const SUFFIX = " €";

    // Lorque l'on précise qu'une fonction est static,
    // cela signifie que la class text va avoir directement cette fonction
    // on pourra alors l'appeler sans l'instancier ainsi : Text::withZero(4);
    private static function withZero($chiffre)
    {
        if ($chiffre < 10){
            return '0' . $chiffre. self::$suffix;
        } else {
            return $chiffre . self::SUFFIX;
        }
    }

    // lorsque l'on voudra appeler une méthode privée static, il faudra employer self
    public static function publicwithZero($chiffre)
    {
        return self::withZero($chiffre);
    }
}