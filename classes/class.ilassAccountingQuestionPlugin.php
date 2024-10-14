<?php
/**
 * Copyright (c) 2013 Institut fuer Lern-Innovation, Friedrich-Alexander-Universitaet Erlangen-Nuernberg
 * GPLv2, see LICENSE
 */

use ILIAS\TestQuestionPool\InternalRequestService;

/**
* Accounting Question plugin
*
* @author Fred Neumann <frd.neumann@gmx.de>
* @version $Id$
*
*/
class ilassAccountingQuestionPlugin extends ilQuestionsPlugin
{
    protected ?assAccountingQuestionConfig $config;
    protected ?assAccountingQuestionRequest $request;


    final public function getPluginName(): string
    {
        return "assAccountingQuestion";
    }

    final public function getQuestionType()
    {
        return "assAccountingQuestion";
    }

    final public function getQuestionTypeTranslation(): string
    {
        return $this->txt($this->getQuestionType());
    }

    public function uninstall(): bool
    {
        if (parent::uninstall()) {
            $this->db->dropSequence('il_qpl_qst_accqst_part');
            $this->db->dropTable('il_qpl_qst_accqst_part', false);
            $this->db->dropTable('il_qpl_qst_accqst_hash', false);
            $this->db->dropTable('il_qpl_qst_accqst_data', false);
        }
        return true;
    }

    /**
     * Get the request handler
     * (may move to a local dic in the future)
     */
    public function request(): assAccountingQuestionRequest
    {
        global $DIC;
        if (!isset($this->request)) {
            $this->request = new assAccountingQuestionRequest(
                $DIC->http(),
                $DIC->refinery(),
                $DIC->upload()
            );
        }
        return $this->request;
    }

    /**
     * Get the global configuration
     * @return assAccountingQuestionConfig
     */
    public function getConfig()
    {
        if (!isset($this->config)) {
            $this->config = new assAccountingQuestionConfig($this);
        }
        return $this->config;
    }

    /**
     * Define if debugging outputs should be shown
     * @return bool
     */
    public function isDebug()
    {
        return false;
    }


    /**
     * Get a value as floating point
     * @param mixed $value
     * @param string $separator (decimal separator)
     * @return float
     */
    public function toFloat($value = null, $separator = ',')
    {
        try {
            if (is_float($value) || is_int($value)) {
                return (float) $value;
            } else {
                $nosep = ($separator == ',' ? '.' : ',');

                $string = strval($value);
                $string = str_replace(' ', '', $string);
                $string = str_replace($nosep, '', $string);
                $string = str_replace($separator, '.', $string);
                return floatval($string);
            }
        } catch (Exception $e) {
            return '';
        }
    }


    /**
     * Get a value as string (decimals are separated by ,)
     * @param mixed $value
     * @param int   $precision for showing numbers
     * @param string  $thousands_delim  for showing numbers
     * @return string
     */
    public function toString($value = null, $precision = null, $thousands_delim = '')
    {
        try {
            if (is_string($value)) {
                return $value;
            } else {
                if ((is_int($value) || is_float($value)) && is_int($precision)) {
                    $string = number_format($value, $precision, ',', $thousands_delim);
                } else {
                    $string = strval($value);
                    $string = str_replace('.', ',', $string);
                    $string = str_replace(' ', '', $string);
                }

                return $string;
            }
        } catch (Exception $e) {
            return '';
        }
    }
}
