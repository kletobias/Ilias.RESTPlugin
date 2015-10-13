<?php
/**
 * ILIAS REST Plugin for the ILIAS LMS
 *
 * Authors: D.Schaefer and T. Hufschmidt <(schaefer|hufschmidt)@hrz.uni-marburg.de>
 * Since 2014
 */
namespace RESTController\libs\Exceptions;


/**
 * This class provides a REST specific exception for missing parameter.
 */
class IliasApplication extends \Exception {
    /**
     * List of default REST error-codes
     *  Extensions are allowed to create their own error-codes.
     *  Using a unique string seems to be an easier solution than assigning unique numbers.
     */
    const ID = 'RESTController\\libs\\Exceptions\\IliasApplication';


    /**
     * Stores parameter name for the missing parameter
     */
    protected $paramName = '';


    /**
     * Constructor
     *  Set parameter name.
     */
    public function __construct ($message, $paramName, $restCode = 0, $previous = NULL) {
        parent::__construct ($message, $restCode, $previous);
        $this->paramName = $paramName;
    }


    /**
     * Get name of parameter that caused the missing parameter exception
     */
    public function paramName() {
        return $this->paramName;
    }


    /**
     *
     */
    public function getFormatedMessage() {
        $message = parent::getMessage();
        $message = str_replace('%paramName%', $this->paramName, $message);
        return $message;
    }
}
