<?php

class Curso
{
    public string $NombreCurso;
    public array $calificaciones ;
    public function __construct($nom)
    {
        $this->NombreCurso = $nom;
    }
    public function agregarALista(float $notaProm){
        $this->calificaciones[] = $notaProm;
    }
    public function get_PromedioGeneral(){
        $cont = 0 ; 
        for($i = 0; $i < count($this->calificaciones) ; $i++){
            $cont += $this->calificaciones[$i];
        }
        return "El promedio general es -> ".number_format($cont/(count($this->calificaciones)),3);
    }
}
class Estudiante
{
    public string  $nombreE;
    public string $apellidos;
    public int $edad;
    public string $dni;
    public float $calificación1;
    public float $calificación2;
    public Curso $curso;
    public float $promedio; 
    public function __construct($nom , $ape , $edad , $id , $cal1 , $cal2, $crso)
    {
        $this->nombreE = $nom ; 
        $this->apellidos = $ape; 
        $this->edad = $edad ; 
        $this->dni = $id; 
        $this->calificación1 = $cal1 ; 
        $this->calificación2 = $cal2; 
        $this->curso = $crso; 
        $this->calcularPromedio(); 
    }
    public function calcularPromedio(){
        $this->promedio = ($this->calificación1 + $this->calificación2)/2 ; 
        $this->curso->agregarALista($this->promedio);
    }
    public function get_infoEstudiante(){
        echo "<hr>"; 
        echo "<br>"; 
        echo "Nombre -> ".$this->nombreE." ".$this->apellidos;
        echo "<br>";
        echo "Edad ->".$this->edad;
        echo "<br>";
        echo "I Parcial -> ".number_format($this->calificación1,2);
        echo "<br>" ; 
        echo "II Parcial -> ".number_format($this->calificación2,2); 
        echo "<br>";
        echo "Promedio Final ->".number_format($this->promedio);
        echo "<br>";  
    }
}
$curso_1 = new Curso('Matematica');
$E1 = new Estudiante('weslin','silva',19,'125487',87.3,85,$curso_1);
$E1->get_infoEstudiante(); 

$E2 = new Estudiante('Arinana','silva',22,'548736',90.63,85.0,$curso_1);
$E2->get_infoEstudiante(); 
$E3 = new Estudiante('Erick','silva',24,'872601',100,100,$curso_1);
$E3->get_infoEstudiante(); 
echo $curso_1->get_PromedioGeneral();