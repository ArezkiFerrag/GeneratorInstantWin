<?php

namespace IGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InstantWin
 *
 * @ORM\Table(name="instant_win")
 * @ORM\Entity(repositoryClass="IGBundle\Repository\InstantWinRepository")
 */
class InstantWin
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="operation", type="integer")
     */
    private $operation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="winAt", type="datetime", unique=true)
     */
    private $winAt;

    /**
     * @var int
     *
     * @ORM\Column(name="idDotation", type="integer")
     */
    private $idDotation;

    /**
     * @var int
     *
     * @ORM\Column(name="idGroup", type="integer")
     */
    private $idGroup;

    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer", nullable=true)
     */
    private $idUser;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set operation
     *
     * @param integer $operation
     * @return InstantWin
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * Get operation
     *
     * @return integer 
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set winAt
     *
     * @param \DateTime $winAt
     * @return InstantWin
     */
    public function setWinAt($winAt)
    {
        $this->winAt = $winAt;

        return $this;
    }

    /**
     * Get winAt
     *
     * @return \DateTime 
     */
    public function getWinAt()
    {
        return $this->winAt;
    }

    /**
     * Set idDotation
     *
     * @param integer $idDotation
     * @return InstantWin
     */
    public function setIdDotation($idDotation)
    {
        $this->idDotation = $idDotation;

        return $this;
    }

    /**
     * Get idDotation
     *
     * @return integer 
     */
    public function getIdDotation()
    {
        return $this->idDotation;
    }

    /**
     * Set idGroup
     *
     * @param integer $idGroup
     * @return InstantWin
     */
    public function setIdGroup($idGroup)
    {
        $this->idGroup = $idGroup;

        return $this;
    }

    /**
     * Get idGroup
     *
     * @return integer 
     */
    public function getIdGroup()
    {
        return $this->idGroup;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return InstantWin
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
