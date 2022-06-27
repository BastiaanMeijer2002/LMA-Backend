<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WeatherDataRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeatherDataRepository::class)]
#[ApiResource]
class WeatherData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer',)]
    #[ORM\ManyToOne(targetEntity: "Geolocation")]
    #[ORM\JoinColumn(name: "geolocation", referencedColumnName: "id")]
    private $geolocation;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'time')]
    private $time;

    #[ORM\Column(type: 'float', nullable: true)]
    private $temperature;

    #[ORM\Column(type: 'float', nullable: true)]
    private $dew_point;

    #[ORM\Column(type: 'float', nullable: true)]
    private $station_pressure;

    #[ORM\Column(type: 'float', nullable: true)]
    private $sealevel_pressure;

    #[ORM\Column(type: 'float', nullable: true)]
    private $visibility;

    #[ORM\Column(type: 'float', nullable: true)]
    private $rainfall;

    #[ORM\Column(type: 'float', nullable: true)]
    private $snowdepth;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $frost;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $rain;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $snow;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $hail;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $thunder;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $tornado;

    #[ORM\Column(type: 'float', nullable: true)]
    private $cloudiness;

    #[ORM\Column(type: 'float', nullable: true)]
    private $wind_direction;

    #[ORM\Column(type: 'float', nullable: true)]
    private $wind_speed;

    /**
     * @return mixed
     */
    public function getWindSpeed()
    {
        return $this->wind_speed;
    }

    /**
     * @param mixed $wind_speed
     */
    public function setWindSpeed($wind_speed): void
    {
        $this->wind_speed = $wind_speed;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeolocation(): ?string
    {
        return $this->geolocation;
    }

    public function setGeolocation(string $geolocation): self
    {
        $this->geolocation = $geolocation;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(?string $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getDewPoint(): ?string
    {
        return $this->dew_point;
    }

    public function setDewPoint(?string $dew_point): self
    {
        $this->dew_point = $dew_point;

        return $this;
    }

    public function getStationPressure(): ?string
    {
        return $this->station_pressure;
    }

    public function setStationPressure(?string $station_pressure): self
    {
        $this->station_pressure = $station_pressure;

        return $this;
    }

    public function getSealevelPressure(): ?float
    {
        return $this->sealevel_pressure;
    }

    public function setSealevelPressure(?float $sealevel_pressure): self
    {
        $this->sealevel_pressure = $sealevel_pressure;

        return $this;
    }

    public function getVisibility(): ?float
    {
        return $this->visibility;
    }

    public function setVisibility(?float $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getRainfall(): ?float
    {
        return $this->rainfall;
    }

    public function setRainfall(?float $rainfall): self
    {
        $this->rainfall = $rainfall;

        return $this;
    }

    public function getSnowdepth(): ?float
    {
        return $this->snowdepth;
    }

    public function setSnowdepth(?float $snowdepth): self
    {
        $this->snowdepth = $snowdepth;

        return $this;
    }

    public function isFrost(): ?bool
    {
        return $this->frost;
    }

    public function setFrost(?bool $frost): self
    {
        $this->frost = $frost;

        return $this;
    }

    public function isRain(): ?bool
    {
        return $this->rain;
    }

    public function setRain(?bool $rain): self
    {
        $this->rain = $rain;

        return $this;
    }

    public function isSnow(): ?bool
    {
        return $this->snow;
    }

    public function setSnow(?bool $snow): self
    {
        $this->snow = $snow;

        return $this;
    }

    public function isHail(): ?bool
    {
        return $this->hail;
    }

    public function setHail(?bool $hail): self
    {
        $this->hail = $hail;

        return $this;
    }

    public function isThunder(): ?bool
    {
        return $this->thunder;
    }

    public function setThunder(?bool $thunder): self
    {
        $this->thunder = $thunder;

        return $this;
    }

    public function isTornado(): ?bool
    {
        return $this->tornado;
    }

    public function setTornado(?bool $tornado): self
    {
        $this->tornado = $tornado;

        return $this;
    }

    public function getCloudiness(): ?float
    {
        return $this->cloudiness;
    }

    public function setCloudiness(?float $cloudiness): self
    {
        $this->cloudiness = $cloudiness;

        return $this;
    }

    public function getWindDirection(): ?float
    {
        return $this->wind_direction;
    }

    public function setWindDirection(?float $wind_direction): self
    {
        $this->wind_direction = $wind_direction;

        return $this;
    }
}
