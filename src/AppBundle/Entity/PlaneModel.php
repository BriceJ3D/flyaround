<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaneModel
 *
 * @ORM\Table(name="plane_model")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaneModelRepository")
 */
class PlaneModel
{

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flight", mappedBy="plane")
     */
    private $planes;

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
     * @ORM\Column(name="model", type="string", length=128)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer", type="string", length=64, nullable=true)
     */
    private $manufacturer;

    /**
     * @var int
     *
     * @ORM\Column(name="cruiseSpeed", type="smallint")
     */
    private $cruiseSpeed;

    /**
     * @var int
     *
     * @ORM\Column(name="planeNbSeats", type="smallint")
     */
    private $planeNbSeats;

    /**
     * @var bool
     *
     * @ORM\Column(name="isAviable", type="boolean")
     */
    private $isAviable;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return PlaneModel
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set manufacturer
     *
     * @param string $manufacturer
     *
     * @return PlaneModel
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set cruiseSpeed
     *
     * @param integer $cruiseSpeed
     *
     * @return PlaneModel
     */
    public function setCruiseSpeed($cruiseSpeed)
    {
        $this->cruiseSpeed = $cruiseSpeed;

        return $this;
    }

    /**
     * Get cruiseSpeed
     *
     * @return int
     */
    public function getCruiseSpeed()
    {
        return $this->cruiseSpeed;
    }

    /**
     * Set paneNbSeats
     *
     * @param integer $paneNbSeats
     *
     * @return PlaneModel
     */
    public function setPlaneNbSeats($planeNbSeats)
    {
        $this->planeNbSeats = $planeNbSeats;

        return $this;
    }

    /**
     * Get paneNbSeats
     *
     * @return int
     */
    public function getPlaneNbSeats()
    {
        return $this->planeNbSeats;
    }

    /**
     * Set isAviable
     *
     * @param boolean $isAviable
     *
     * @return PlaneModel
     */
    public function setIsAviable($isAviable)
    {
        $this->isAviable = $isAviable;

        return $this;
    }

    /**
     * Get isAviable
     *
     * @return bool
     */
    public function getIsAviable()
    {
        return $this->isAviable;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->planes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add plane
     *
     * @param \AppBundle\Entity\Flight $plane
     *
     * @return PlaneModel
     */
    public function addPlane(\AppBundle\Entity\Flight $plane)
    {
        $this->planes[] = $plane;

        return $this;
    }

    /**
     * Remove plane
     *
     * @param \AppBundle\Entity\Flight $plane
     */
    public function removePlane(\AppBundle\Entity\Flight $plane)
    {
        $this->planes->removeElement($plane);
    }

    /**
     * Get planes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlanes()
    {
        return $this->planes;
    }

    public function __toString(){
        return $this->model;
    }
}
