<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 02.11.17
 * Time: 17:35
 */

namespace Lengoo\MateCatBundle\Model;

class Project
{
    private $project_name;
    private $source_lang;
    private $target_lang;
    private $tms_engine;
    private $mt_engine;
    private $private_tm_key;
    private $subject;
    private $segmentation_rule;
    private $owner_email;
    private $files;

    public function __construct()
    {
        $this
            ->setTmsEngine(1)
            ->setMtEngine(1)
            ->setPrivateTmKey("c8dc87f969cfc0251532");
    }

    /**
     * @return mixed
     */
    public function getProjectName()
    {
        return $this->project_name;
    }

    /**
     * @param mixed $project_name
     * @return Project
     */
    public function setProjectName($project_name)
    {
        $this->project_name = $project_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSourceLang()
    {
        return $this->source_lang;
    }

    /**
     * @param mixed $source_lang
     * @return Project
     */
    public function setSourceLang($source_lang)
    {
        $this->source_lang = $source_lang;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTargetLang()
    {
        return $this->target_lang;
    }

    /**
     * @param mixed $target_lang
     * @return Project
     */
    public function setTargetLang($target_lang)
    {
        $this->target_lang = $target_lang;
        return $this;
    }

    /**
     * @return int
     */
    public function getTmsEngine()
    {
        return $this->tms_engine;
    }

    /**
     * @param int $tms_engine
     * @return Project
     */
    public function setTmsEngine($tms_engine)
    {
        $this->tms_engine = $tms_engine;
        return $this;
    }

    /**
     * @return int
     */
    public function getMtEngine()
    {
        return $this->mt_engine;
    }

    /**
     * @param int $mt_engine
     * @return Project
     */
    public function setMtEngine($mt_engine)
    {
        $this->mt_engine = $mt_engine;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrivateTmKey()
    {
        return $this->private_tm_key;
    }

    /**
     * @param mixed $private_tm_key
     * @return Project
     */
    public function setPrivateTmKey($private_tm_key)
    {
        $this->private_tm_key = $private_tm_key;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     * @return Project
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSegmentationRule()
    {
        return $this->segmentation_rule;
    }

    /**
     * @param mixed $segmentation_rule
     * @return Project
     */
    public function setSegmentationRule($segmentation_rule)
    {
        $this->segmentation_rule = $segmentation_rule;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerEmail()
    {
        return $this->owner_email;
    }

    /**
     * @param mixed $owner_email
     * @return Project
     */
    public function setOwnerEmail($owner_email)
    {
        $this->owner_email = $owner_email;
        return $this;
    }

    /**
     * @return []
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param [] $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }


}