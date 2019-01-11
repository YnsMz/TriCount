<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TriCountRepository")
 */
class TriCount
{
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     * @Assert\NotBlank
     * @Assert\GreaterThan(0,
     *  message="Le nombre doit être supérieur à 0")
     * @Assert\LessThanOrEqual(propertyPath="maxLenght",
     *  message="Le nombre doit être inférieur ou égal à maxLenght")
     * @Assert\Type("int",
     *  message="Veuillez saisir un nombre")
     */
    private $minLenght;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     * @Assert\NotBlank
     * @Assert\GreaterThanOrEqual(propertyPath="minLenght",
     *  message="Le nombre doit être supérieur ou égal à minLenght")
     * @Assert\LessThanOrEqual(1000000,
     *  message="Le nombre doit être inférieur ou égal à 1 000 000")
     * @Assert\Type("int",
     *  message="Veuillez saisir un nombre")
     */
    private $maxLenght;

    /**
     *@param $minLength integer
     *@param $maxLength integer
     *@return integer
     */
    public function count(int $minLength , int $maxLength ){

        //initialisation du compteur de triangle parfait
        $count = 0;

        //Boucle for i -> Premier côté
        //Boucle for j -> Second côté
        //Boucle for k -> Troisième côté
        for ($i = $minLength; $i <= $maxLength; $i++){

            for($j = $i ; $j <= $maxLength; $j++){

                for($k = $j ; $k <= $maxLength; $k++){

                    //si la somme des deux premiers côtés (qui sont les plus petits) est supérieure au troisième (le plus grand)
                    if( ($i + $j ) > $k ) {

                        $count++;

                        //si le nombre de possibilité dépasse 1 000 000 000
                        if ($count >= 1000000000 ){
                            return -1;
                        }
                    }
                    else{
                        break;
                    }
                }
            }
        }
        return $count;
    }


    public function getMinLenght(): ?int
    {
        return $this->minLenght;
    }

    public function setMinLenght(int $minLenght): self
    {
        $this->minLenght = $minLenght;

        return $this;
    }

    public function getMaxLenght(): ?int
    {
        return $this->maxLenght;
    }

    public function setMaxLenght(int $maxLenght): self
    {
        $this->maxLenght = $maxLenght;

        return $this;
    }
}
