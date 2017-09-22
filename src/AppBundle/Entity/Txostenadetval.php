<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Txostenadetval
 *
 * @ORM\Table(name="txostenadetval")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TxostenadetvalRepository")
 */
class Txostenadetval
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
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="mota", type="string", length=255)
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
     * @var integer
     * @Gedmo\SortablePosition
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /*****************************************************************************************************************/
    /*** ERLAZIOAK ***************************************************************************************************/
    /*****************************************************************************************************************/

    /**
     * @var \AppBundle\Entity\Txostenadet
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Txostenadet", inversedBy="txostenadetval")
     * @ORM\JoinColumn(name="txostenadet_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $txostenadet;

    public function __toString()
    {
        return (string) $this->getName();
    }

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
        $this->name = "Detailea =>" . $this->name;
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
     * @return Txostenadetval
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
     * @return Txostenadetval
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
     * @return Txostenadetval
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
     * @return Txostenadetval
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
     * Set txostenadet
     *
     * @param \AppBundle\Entity\Txostenadet $txostenadet
     *
     * @return Txostenadetval
     */
    public function setTxostenadet(\AppBundle\Entity\Txostenadet $txostenadet = null)
    {
        $this->txostenadet = $txostenadet;

        return $this;
    }

    /**
     * Get txostenadet
     *
     * @return \AppBundle\Entity\Txostenadet
     */
    public function getTxostenadet()
    {
        return $this->txostenadet;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Txostenadetval
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
     * @return Txostenadetval
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
}