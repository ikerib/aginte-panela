<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Txostena
 *
 * @ORM\Table(name="txostena")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TxostenaRepository")
 */
class Txostena
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
     * @var \DateTime
     *
     * @ORM\Column(name="fetxa", type="datetime")
     */
    private $fetxa;

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
     * @var txostenadet[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Txostenadet", mappedBy="txostena",cascade={"remove"})
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $txostenadet;



    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->txostenadet = new ArrayCollection();
        $this->fetxa = new \DateTime();
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
        $this->name = "Txostena " . $this->fetxa->format('Y/m/d');
    }

    public function __toString()
    {
        return $this->getName();
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
     * @return Txostena
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
     * Set fetxa
     *
     * @param \DateTime $fetxa
     *
     * @return Txostena
     */
    public function setFetxa($fetxa)
    {
        $this->fetxa = $fetxa;

        return $this;
    }

    /**
     * Get fetxa
     *
     * @return \DateTime
     */
    public function getFetxa()
    {
        return $this->fetxa;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Txostena
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
     * @return Txostena
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
     * @return Txostena
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
     * @return Txostena
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
     * @return Txostena
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
     * @return Txostena
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
}
