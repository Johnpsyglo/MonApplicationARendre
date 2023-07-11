<?php
class MaConnexion{

    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;
    /*private static $connexionPDO;*/

    /*permet de construire la connexion avec la base de donnée*/
    public function __construct($nomBaseDeDonnees, $motDePasse, $nomUtilisateur, $hote, )
    {   
         $this->nomBaseDeDonnees = $nomBaseDeDonnees;
         $this->motDePasse = $motDePasse;
         $this->nomUtilisateur = $nomUtilisateur;
         $this->hote = $hote;
        
         try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "j'ai reussi";

         } catch (PDOException $e) {
            echo "erreur :";$e->getMessage();
         }
    }   

    public function select ($Accueillet, $CatégorieDeChambre, $NouvelleSalle, $Page, $Réservation, $UtilisateurReg, $Enquête, $Recherche, $Rapports ){
        try {
            //permet de selecter 
            $requete = "SELECT Accueillet, CatégorieDeChambre, NouvelleSalle, 'Page', Réservation, UtilisateursReg, Enquête, Recherche, Rapports FROM module_admin WHERE 1 ;


            -- permet de preparer la requete

            $requete_preparee = $this->connexionPDO->prepare($requete);
           
            /*permet de preparer identifiant et motdepasse*/
            $requete_preparee->bindParam(":Accueillet , $Accueil, PDO::PARAM_STR);

            $requete_preparee->bindParam(":CatégorieDeChambre", $CatégorieDeChambre, PDO::PARAM_STR);
            $requete_preparee->bindParam(":NouvelleSalle", $Page, PDO::PARAM_STR);
            $requete_preparee->bindParam(":Page", $Page, PDO::PARAM_STR);
            $requete_preparee->bindParam(":Réservation", $Réservation, PDO::PARAM_STR);
            $requete_preparee->bindParam(":UtilisateursReg", $UtilisateursReg, PDO::PARAM_STR);
            $requete_preparee->bindParam(":Enquête", $Enquête, PDO::PARAM_STR);
            $requete_preparee->bindParam(":Recherche", $Recherche, PDO::PARAM_STR);
            $requete_preparee->bindParam(":Rapports", $Rapports, PDO::PARAM_STR);
            

            //
            $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;
        } catch (\PDOException $error) {
            return "erreur : " .$error->getMessage();
           // throw $th;
        }

    }
    

        

}

?>