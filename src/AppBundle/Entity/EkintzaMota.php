<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Traits\BlameableEntity;

/**
 * EkintzaMota
 *
 * @ORM\Table(name="ekintza_mota")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EkintzaMotaRepository")
 */
class EkintzaMota
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
     * @ORM\Column(name="name", type="string", length=191, unique=true)
     */
    private $name;

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
    protected $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_updated", referencedColumnName="id")
     * @Gedmo\Blameable(on="update")
     */
    protected $updatedBy;

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
     * @var txostenadet[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Txostenadet", mappedBy="ekintzamota",cascade={"remove"})
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $txostenadet;


    /**
     * @var ekintzamotadet[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ekintzamotadet", mappedBy="ekintzamota",cascade={"remove"})
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $ekintzamotadet;

    public function __toString()
    {
        return $this->getName();
    }

    public function __construct()
    {
        $this->txostenadet = new ArrayCollection();
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
     * @return EkintzaMota
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return EkintzaMota
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
     * @return EkintzaMota
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
     * @return EkintzaMota
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
     * @return EkintzaMota
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
     * @return EkintzaMota
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
     * Add txostenadet
     *
     * @param \AppBundle\Entity\Txostenadet $txostenadet
     *
     * @return EkintzaMota
     */
    public function addTxostenadet(\AppBundle\Entity\Txostenadet $txostenadet)
    {
        $this->txostenadet[] = $txostenadet;

        return $this;
    }

    /**
     * Remove txostenadet
     *
     * @param \AppBundle\Entity\Txostenadet $txostenadet
     */
    public function removeTxostenadet(\AppBundle\Entity\Txostenadet $txostenadet)
    {
        $this->txostenadet->removeElement($txostenadet);
    }

    /**
     * Get txostenadet
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTxostenadet()
    {
        return $this->txostenadet;
    }

    /**
     * Add ekintzamotadet
     *
     * @param \AppBundle\Entity\Ekintzamotadet $ekintzamotadet
     *
     * @return EkintzaMota
     */
    public function addEkintzamotadet(\AppBundle\Entity\Ekintzamotadet $ekintzamotadet)
    {
        $this->ekintzamotadet[] = $ekintzamotadet;

        return $this;
    }

    /**
     * Remove ekintzamotadet
     *
     * @param \AppBundle\Entity\Ekintzamotadet $ekintzamotadet
     */
    public function removeEkintzamotadet(\AppBundle\Entity\Ekintzamotadet $ekintzamotadet)
    {
        $this->ekintzamotadet->removeElement($ekintzamotadet);
    }

    /**
     * Get ekintzamotadet
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEkintzamotadet()
    {
        return $this->ekintzamotadet;
    }
}
