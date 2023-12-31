<?php

namespace MuslimahGuide\Repository;


use MuslimahGuide\Domain\education;

class EducationRepository
{
    private \PDO $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function add(education $education) :int{
        $sql = "INSERT INTO educations(img, title, contents, on_clicked) VALUES(?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);

        $statement->execute([
            $education->getImg(),
            $education->getTitle(),
            $education->getContents(),
            $education->getOnClicked()
        ]);
        $res = $this->connection->lastInsertId();
        return $res;
    }

    public function update(education $education) :bool{
        $sql = "UPDATE educations SET img = ?, title = ?, contents = ?, on_clicked = ? WHERE education_id = ?";
        $statement = $this->connection->prepare($sql);

        $res = $statement->execute([
            $education->getImg(),
            $education->getTitle(),
            $education->getContents(),
            $education->getOnClicked(),
            $education->getEducationId()
        ]);
        return $res;
    }

    public function delete(string $id) :bool{
        $sql = "DELETE FROM educations WHERE education_id = ?";
        $statement = $this->connection->prepare($sql);

        return $statement->execute([$id]);
    }

    public function getById(int $id) : ?education{
        $sql = "SELECT * FROM educations WHERE education_id = ?";
        $statement = $this->connection->prepare($sql);

        if($statement->execute([$id])){
            foreach ($statement as $row){
                return $this->mapToDomain($row);
            }
        }
        return null;
    }

    public function getByIdAPI(int $id) : ?array{
        $sql = "SELECT * FROM educations WHERE education_id = ?";
        $statement = $this->connection->prepare($sql);

        if($statement->execute([$id])){
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function getAll() :?array{
        $sql = "SELECT * FROM educations";

        $statement = $this->connection->prepare($sql);
        if($statement->execute()){
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return [];
    }


    public function search($input) :array{
        $sql = "SELECT * FROM educations WHERE title LIKE '%$input%' OR contents LIKE '%$input%'";

        $statement = $this->connection->prepare($sql);
        if($statement->execute()){
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function addOnClick(education $education) :bool{
        $sql = "UPDATE educations SET on_clicked = ? WHERE education_id = ?";

        $statement = $this->connection->prepare($sql);
        $res = $statement->execute([
            $education->getOnClicked(),
            $education->getEducationId()
        ]);
        return $res;
    }

    public function dashboard() :array{
        $sql = "SELECT * FROM `educations` ORDER BY on_clicked DESC LIMIT 3";
        $statement = $this->connection->prepare($sql);
        if($statement->execute()){
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return [];
    }


    public function mapToDomain($row) :education{
        $education = new education(
            $row['img'],
            $row['title'],
            $row['contents'],
            $row['on_clicked']
        );

        return $education;
    }

}