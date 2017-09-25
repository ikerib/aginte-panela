<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Txostenadet
 *
 * @ORM\Table(name="txostenadet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TxostenadetRepository")
 */
class Txostenadet
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
     * @ORM\Column(name="name", type="string", length=255)
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EkintzaMota", inversedBy="txostenadet")
     * @ORM\JoinColumn(name="ekintzamota_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $ekintzamota;


    /**
     * @var \AppBundle\Entity\Txostena
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Txostena", inversedBy="txostenadet")
     * @ORM\JoinColumn(name="txostena_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $txostena;

    /**
     * @var txostenadetval[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Txostenadetval", mappedBy="txostenadet",cascade={"remove"})
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $txostenadetval;

    public function __toString()
    {
        return (string) $this->getName();
    }

    public function __construct()
    {
        $this->txostenadetval = new ArrayCollection();
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
        $this->name = "Balioa =>" . $this->txostena;
    }

    /*****************************************************************************************************************/
    /*** FIN ERLAZIOAK ***********************************************************************************************/
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
     * @return Txostenadet
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
     * @return Txostenadet
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
     * @return Txostenadet
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
     * @return Txostenadet
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
     * @return Txostenadet
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
     * @return Txostenadet
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
     * @return Txostenadet
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

    /**
     * Set txostena
     *
     * @param \AppBundle\Entity\Txostena $txostena
     *
     * @return Txostenadet
     */
    public function setTxostena(\AppBundle\Entity\Txostena $txostena = null)
    {
        $this->txostena = $txostena;

        return $this;
    }

    /**
     * Get txostena
     *
     * @return \AppBundle\Entity\Txostena
     */
    public function getTxostena()
    {
        return $this->txostena;
    }

    /**
     * Add txostenadetval
     *
     * @param \AppBundle\Entity\Txostenadetval $txostenadetval
     *
     * @return Txostenadet
     */
    public function addTxostenadetval(\AppBundle\Entity\Txostenadetval $txostenadetval)
    {
        $this->txostenadetval[] = $txostenadetval;

        return $this;
    }

    /**
     * Remove txostenadetval
     *
     * @param \AppBundle\Entity\Txostenadetval $txostenadetval
     */
    public function removeTxostenadetval(\AppBundle\Entity\Txostenadetval $txostenadetval)
    {
        $this->txostenadetval->removeElement($txostenadetval);
    }

    /**
     * Get txostenadetval
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTxostenadetval()
    {
        return $this->txostenadetval;
    }
}
