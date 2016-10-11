<?php
include 'kreiranje_baza.php';

function Kreiranje()
{
    include 'povrzuvanje.php';
    $msg="";
    $br=1;
    if(isset($_POST["submit"]))
    {
        if(!(empty($_POST["name"]))&&(!(empty($_POST["lastname"])))&&(!(empty($_POST["username"])))&&(!(empty($_POST["password"])))&&(!(empty($_POST["oper"])))&&(!(empty($_POST["platagodina"]))))
        {
            if(is_numeric($_POST["platagodina"]))
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    if($row["korisnicko"]==($_POST["username"]))
                    {
                        $msg="Корисничкото име веке постои";
                        $br += 1;
                    }
                }
                if($br==1)
                {
                    $name=$_POST["name"];
                    $last=$_POST["lastname"];
                    $korime=$_POST["username"];
                    $pass=$_POST["password"];
                    $poz=$_POST["oper"];
                    $vre=$_POST["platagodina"];
                    $query="INSERT INTO fakultet (ime,prezime,korisnicko,lozinka,profesija,vrednost) VALUES('$name','$last','$korime','$pass','$poz','$vre');";
                    $result= mysqli_query($connection, $query);
                    if ($result)
                        $msg="Креиран е нов корисник";
                }
            }
            $br=1;
        }
    }
    unset($_POST["submit"]);
    mysqli_close($connection);
}
function Najavaa()
{
    $msg="";
    function redirect_to($kade)
    {
        header("Location: ".$kade);
        exit;
    }
    include 'povrzuvanje.php';
    if ( isset( $_POST['submit'] ) )
    {
        if(!(empty($_POST["username"]))&&(!(empty($_POST["password"]))))
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if(($row['korisnicko']==$_POST['username'])&&( $row['lozinka']==$_POST['password']))
                    redirect_to("najaven.php?username=".$_POST['username']);
                else
                    $msg="Greska pri najava;";
            }
        }
    }
    unset($_POST["submit"]);
    mysqli_close($connection);



}
function Zaboravenaa()
{
    include 'povrzuvanje.php';
    $msg="";
    if ( isset( $_POST['submit'] ) )
    {
        if(!(empty($_POST["username"]))&&(!(empty($_POST["password"]))))
        {
            $sql = "UPDATE fakultet SET lozinka='".$_POST['password']."' WHERE korisnicko='".$_POST['username']."'";
            if (mysqli_query($connection, $sql))
            {
                $msg= "Вашата лозинка е успешно променета";
            }
            else
            {
                $msg="Грешка";
            }
        }
    }
}
function Listaa()
{
    include 'povrzuvanje.php';
    $msg="<table align=center border=0><tr><td>Име</td><td>Презиме</td><td>Професија</td></tr>";
    while($row=mysqli_fetch_assoc($result))
    {
        $msg .= "<tr><td>".$row["ime"]."</td><td>".$row["prezime"]."</td><td>".$row["profesija"]."</td></tr>";

    }
    $msg .= "</table>";
    echo $msg;
    unset($_POST["submit"]);
    mysqli_close($connection);


}
function Najavenn()
{
    include 'povrzuvanje.php';
    $msg=$_GET["username"];
    while($row=mysqli_fetch_assoc($result))
    {
        if($row["korisnicko"]==$_GET["username"])
            $msg1= $row["profesija"];
    }
    mysqli_close($connection);

}