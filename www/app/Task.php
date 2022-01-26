<?php 
namespace ToDo;
use PDO;
use PDOException;
$validationErrors = [];
class Task{
    protected $pdo;
    private $subject;
    private $priority;
    private $dueDate;
    private $status = 0;

    public function __construct($pdo){
        $this->pdo =$pdo;
    }
    
        
public function createTask($task){
    $this->subject = $task['subject'];
    $this->priority = $task['priority'];
    $this->dueDate = $task['dueDate'];
    $this->insertTask();                        // <------------- baigem cia
}
    private function insertTask(){
        try{
            $query = "INSERT INTO `tasks`(`subject`, `priority`, `dueDate`, `status`, `modified`) 
            VALUES (:subject, :priority, :dueDate, :status, NOW())";
            $stmt = $this-> pdo-> prepare($query);
            $stmt->bindParam(':subject', $this->subject, PDO::PARAM_STR);
            $stmt->bindParam(':priority', $this->priority, PDO::PARAM_STR);
            $stmt->bindParam(':dueDate', $this->dueDate, PDO::PARAM_STR);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
            $stmt->execute();
            header('Location:/');
        }catch(PDOException $e){
                echo $e->getMessage();
        }
    }
    public function allTasks(){
        $statment = $this->pdo->prepare('select * from tasks');
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);               //grazinam kaip asociatyvu masyva
    }

    public function deleteTask($id){
        $statment = $this->pdo->prepare("DELETE FROM `tasks` WHERE id=$id");
        $statment->execute();
        header('Location:/');
        
    }
    public function setComplete($id){
        $this->status = 1;
        try{
            $query = "UPDATE tasks SET `status`=:status WHERE id=:id";
            $stmt = $this-> pdo-> prepare($query);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            header('Location:/');
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    function validate($task){
        global $validationErrors;
        if(empty($task['subject']) || !preg_match('/^[A-Z ]/', $task['subject']) ){
            $validationErrors[]= "Neivestas arba neteisingas ivestas vardas";
        }
        // if(empty($data['lname']) & !preg_match('/^[A-Z]/', $data['lname']) ){
        //     $validationErrors[]= "Neivestas arba neteisingas ivesta pavarde";
        // }
        // if(empty($data['email']) & !preg_match('/^[^@]+@[^@]+\.[a-z]{2,6}$/', $data['email']) ){
        //     $validationErrors[]= "Neteisingai ivestas el pastas";
        // }
        // if(empty($data['message']) & !preg_match('/^[A-Za-z0-9]{1-200}$/', $data['message']) ){
        //     $validationErrors[]= "Neteisingi arba per daug simboliu";
        // }
        
    
        return $validationErrors;
    }
}
?>