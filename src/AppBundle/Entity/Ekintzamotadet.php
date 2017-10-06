<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Ekintzamotadet
 *
 * @ORM\Table(name="ekintzamotadet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EkintzamotadetRepository")
 */
class Ekintzamotadet
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=191)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=191, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="mota", type="string", length=191)
     */
    private $mota;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_created", referencedColumnName="id")
     * @Gedmo\Blameable(on="create")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_updated", referencedColumnName="id")
     * @Gedmo\Blameable(on="update")
     */
    private $updatedBy;

    /**
     * @var integer
     * @Gedmo\SortablePosition
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /*****************************************************************************************************************/
    /*** ERLAZIOAK ***************************************************************************************************/
    /*****************************************************************************************************************/

    /**
     * @var \AppBundle\Entity\EkintzaMota
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EkintzaMota", inversedBy="ekintzamotadet")
     * @ORM\JoinColumn(name="ekintzamota_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $ekintzamota;

    public function __toString()
    {
        return $this->getName();
    }

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }

    /*****************************************************************************************************************/
    /*****************************************************************************************************************/
    /*****************************************************************************************************************/



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
     * Set name
     *
     * @param string $name
     *
     * @return Ekintzamotadet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Ekintzamotadet
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set mota
     *
     * @param string $mota
     *
     * @return Ekintzamotadet
     */
    public function setMota($mota)
    {
        $this->mota = $mota;

        return $this;
    }

    /**
     * Get mota
     *
     * @return string
     */
    public function getMota()
    {
        return $this->mota;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Ekintzamotadet
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Ekintzamotadet
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return Ekintzamotadet
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     *
     * @return Ekintzamotadet
     */
    public function setCreatedBy(\AppBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     *
     * @return Ekintzamotadet
     */
    public function setUpdatedBy(\AppBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set ekintzamota
     *
     * @param \AppBundle\Entity\EkintzaMota $ekintzamota
     *
     * @return Ekintzamotadet
     */
    public function setEkintzamota(\AppBundle\Entity\EkintzaMota $ekintzamota = null)
    {
        $this->ekintzamota = $ekintzamota;

        return $this;
    }

    /**
     * Get ekintzamota
     *
     * @return \AppBundle\Entity\EkintzaMota
     */
    public function getEkintzamota()
    {
        return $this->ekintzamota;
    }
}
