<?php

/*
 *     Iker Ibarguren <@ikerib>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use FR3D\LdapBundle\Model\LdapUserInterface;

/**
 * User.
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser implements LdapUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $dn;

    /**
     * @ORM\Column(type="string", length=191, nullable=true)
     */
    protected $department;

    /**
     * @ORM\Column(type="string", length=191, nullable=true)
     */
    protected $displayname;

    /**
     * @ORM\Column(type="string", length=191, nullable=true)
     */
    protected $nan;

    /**
     * @ORM\Column(type="string", length=191, nullable=true)
     */
    protected $lanpostua;

    /**
     * @ORM\Column(type="string", length=191, nullable=true)
     */
    protected $notes;

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $members = [];

    /*****************************************************************************************************************/
    /*** ERLAZIOAK ***************************************************************************************************/
    /*****************************************************************************************************************/


    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->members = [];

        if (empty($this->roles)) {
            $this->roles[] = 'ROLE_USER';
        }
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    /**
     * Set Ldap Distinguished Name.
     *
     * @param string $dn Distinguished Name
     */
    public function setDn($dn)
    {
        $this->dn = $dn;
    }

    /**
     * Get Ldap Distinguished Name.
     *
     * @return null|string Distinguished Name
     */
    public function getDn()
    {
        return $this->dn;
    }

    /*****************************************************************************************************************/
    /*****************************************************************************************************************/
    /*****************************************************************************************************************/


    /**
     * Set department
     *
     * @param string $department
     *
     * @return User
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set displayname
     *
     * @param string $displayname
     *
     * @return User
     */
    public function setDisplayname($displayname)
    {
        $this->displayname = $displayname;

        return $this;
    }

    /**
     * Get displayname
     *
     * @return string
     */
    public function getDisplayname()
    {
        return $this->displayname;
    }

    /**
     * Set nan
     *
     * @param string $nan
     *
     * @return User
     */
    public function setNan($nan)
    {
        $this->nan = $nan;

        return $this;
    }

    /**
     * Get nan
     *
     * @return string
     */
    public function getNan()
    {
        return $this->nan;
    }

    /**
     * Set lanpostua
     *
     * @param string $lanpostua
     *
     * @return User
     */
    public function setLanpostua($lanpostua)
    {
        $this->lanpostua = $lanpostua;

        return $this;
    }

    /**
     * Get lanpostua
     *
     * @return string
     */
    public function getLanpostua()
    {
        return $this->lanpostua;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return User
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set members
     *
     * @param array $members
     *
     * @return User
     */
    public function setMembers($members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * Get members
     *
     * @return array
     */
    public function getMembers()
    {
        return $this->members;
    }
}
