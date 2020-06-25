<?php
Class managerChambre
{
    private $_db=null;
    
    private function getConnexion(){
        //Connexion est fermée
        if($this->_db==null){
            try{
              $this->_db = new PDO("mysql:host=localhost;dbname=projetbinomepoo","root","");
              $this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            }catch(PDOException $ex){
               die("Erreur de Connexion");
            }
        }
        
    }

    private function closeConnexion(){
      
        if($this->_db!=null){
          $this->_db=null;
        }
      }



    //The others functions
    public function add(Chambre $chambre){
        $this->getConnexion();
        $request = $this->_db->prepare('INSERT INTO chambre(numeroChambre, numeroBatiment, typeChambre) VALUES(:num,:numBat,:typeChambre)');
        $request->bindValue(':num',$chambre->getNumero());
        $request->bindValue(':numBat',$chambre->getNumeroBatiment());
        $request->bindValue(':typeChambre',$chambre->getType());
        $request->execute();
        $this->closeConnexion();
    }

    public function count()
    {
        $this->getConnexion();
        return $this->_db->query('SELECT COUNT(*) FROM chambre')->fetchColumn();
        $this->closeConnexion();
    }

    public function delete(Chambre $chambre){
        $this->getConnexion();
        $this->_db->exec('DELETE FROM chambre WHERE numeroChambre = '.$chambre->getNumero());
        $this->closeConnexion();
    }

    public function exists($info){
        if (is_int($info)) {
            $this->getConnexion();
            return (bool) $this->_db->query('SELECT COUNT(*) FROM chambre WHERE numeroChambre='.$info)->fetchColumn();
        }
       // $request  = $this->_db->prepare('SELECT COUNT(*) FROM chambre WHERE nom = :nom');
        //$request->execute([':nom' => $info]);

      //  return (bool) $request->fetchColumn();
    }

    public function get($info){
        if(is_int($info)){
            $this->getConnexion();
            $request = $this->_db->query('SELECT numeroChambre, numeroBatiment, typeChambre FROM chambre WHERE numeroChambre ='.$info);
            $data = $request->fetch(2);
            $this->closeConnexion();
            return new Chambre($data);
        }
        /*else
        {
            $request = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom');
            $request->execute([':nom' => $info]);

            return new Personnage($request->fetch(PDO::FETCH_ASSOC));

        }*/
    }

    public function getList(){
        $chambres= [];
        $this->getConnexion();
        $request = $this->_db->query('SELECT numeroChambre, numeroBatiment, typeChambre FROM chambre ORDER BY numeroChambre');
       
        while($data = $request->fetch(PDO::FETCH_ASSOC)){
            $persos[] = new Chambre($data);
        }
        $this->closeConnexion();
        return $chambres;
    }

    public function update(Chambre $chambre){
        $this->getConnexion();
        $request = $this->_db->prepare('UPDATE chambre SET numeroBatiment = :numBat WHERE numeroChambre = :numChambre');
        
        $request  -> bindValue(':numBat', $chambre->getNumeroBatiment(), PDO::PARAM_STR);
        $request -> bindValue(':numChambre', $chambre->getNumero(), PDO::PARAM_STR);

        $request->execute();
        $this->closeConnexion();
    }

    




}