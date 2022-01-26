<?php

namespace App\Models;

use App\Models\DBAbstractModel;

class Superhero extends DBAbstractModel
{
    private static $instance;
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    private static $createQuery = "INSERT INTO superheroes(nombre, velocidad) VALUES(:nombre, :velocidad)";
    private static $readByIdQuery = "SELECT * FROM superheroes WHERE id = :id";
    private static $readByNameQuery = "SELECT * FROM superheroes WHERE nombre LIKE CONCAT('%', :name, '%')";
    private static $readAllQuery = "SELECT * FROM superheroes";
    private static $updateQuery = "UPDATE superheroes SET nombre=:nombre, velocidad=:velocidad WHERE id = :id";
    private static $deleteQuery = "DELETE FROM superheroes WHERE id = :id";
    // private static $readPageQuery = "SELECT * FROM superheroes ORDER BY id LIMIT :min, :max";
    private static $readPageQuery = "SELECT * FROM superheroes ORDER BY id LIMIT ";
    // private static $readLastPageQuery = "SELECT * FROM superheroes ORDER BY id DESC LIMIT :shpage";
    private static $readLastPageQuery = "SELECT * FROM superheroes ORDER BY id DESC LIMIT " . SHPORPAGINA;

    var $id;
    var $name;
    var $speed;
    var $createdAt;
    var $updatedAt;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function insert()
    {
        $this->query = self::$createQuery;
        $this->parameters['nombre'] = $this->name;
        $this->parameters['velocidad'] = $this->speed;
        $this->get_results_from_query();
        $this->message = 'SH agregado correctamente';
    }

    public function readByName($name = '')
    {
        if ($name != '') {
            $this->query = self::$readByNameQuery;
            $this->parameters['name'] = $name;
            $this->get_results_from_query();
        }
        if (count($this->rows) != 0) {
            $this->message = 'SH no encontrado.';
        } else {
            $this->message = 'SH encontrado.';
        }
        return $this->rows;
    }

    public function read($id = '')
    {
        if ($id != '') {
            $this->query = self::$readByIdQuery;
            $this->parameters['id'] = $id;
            $this->get_results_from_query();
        }
        if (count($this->rows[0]) == 1) {
            foreach ($this->rows[0] as $property => $value) {
                $this->property = $value;
            }
            $this->message = 'SH encontrado.';
        } else {
            $this->message = 'SH no encontrado.';
        }
        return $this->rows;
    }

    public function readAll()
    {
        $this->query = self::$readAllQuery;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function update()
    {
        $this->query = self::$updateQuery;
        $this->parameters['id'] = $this->id;
        $this->parameters['nombre'] = $this->name;
        $this->parameters['velocidad'] = $this->speed;

        $this->get_results_from_query();
        $this->message = 'SH modificado';
    }

    public function delete()
    {
        $this->query = self::$deleteQuery;
        $this->parameters['id'] = $this->id;

        $this->get_results_from_query();
        $this->message = 'SH eliminado';
    }

    public function readLastPage()
    {
        $this->query = self::$readLastPageQuery;
        //$this->parameters['shpage'] = SHPORPAGINA;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function readPage($page)
    {
        var_dump($page);
        $page = substr($page, 0, -2);
        var_dump($page);
        $minRowNumber = $page * SHPORPAGINA;
        $maxRowNumber = $page * SHPORPAGINA + $page * SHPORPAGINA;
        // $this->parameters['min'] = $page * SHPORPAGINA;
        // $this->parameters['max'] = $page * SHPORPAGINA + $page * SHPORPAGINA;
        $this->query = self::$readPageQuery . $minRowNumber . ", " . $maxRowNumber;
        $this->get_results_from_query();
        return $this->rows;
    }
};
