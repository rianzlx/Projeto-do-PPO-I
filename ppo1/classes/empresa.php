<?php
class Empresa
{
    private $conn;
    private $id_empresa;
    private $nome_empresa;
    private $email_empresa;
    private $cnpj_empresa;
    private $senha_empresa;
    private $telefone_empresa;

    // Construtor
    public function __construct($connp)
    {
        if ($connp instanceof PDO) {
            $this->conn = $connp;
        } else {
            throw new Exception("A conexão não é válida.");
        }
    }

    // Setters
    public function setid_empresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;
    }

    public function setnome_empresa($nome_empresa)
    {
        $this->nome_empresa = $nome_empresa;
    }

    public function setemail_empresa($email_empresa)
    {
        $this->email_empresa = $email_empresa;
    }

    public function setcnpj_empresa($cnpj_empresa)
    {
        $this->cnpj_empresa = $cnpj_empresa;
    }

    public function setsenha_empresa($senha_empresa)
    {
        $this->senha_empresa = $senha_empresa;
    }

    public function settelefone_empresa($telefone_empresa)
    {
        $this->telefone_empresa = $telefone_empresa;
    }

    // Inserção de dados
    public function insert()
    {
        if (empty($this->nome_empresa) || empty($this->email_empresa) || empty($this->cnpj_empresa) || empty($this->senha_empresa) || empty($this->telefone_empresa)) {
            echo "Erro: Todos os campos são obrigatórios.";
            return;
        }

        $sql = "INSERT INTO empresa (nome_empresa, email_empresa, cnpj_empresa, senha_empresa, telefone_empresa) 
                VALUES (:nome_empresa, :email_empresa, :cnpj_empresa, :senha_empresa, :telefone_empresa)";

        try {
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nome_empresa', $this->nome_empresa);
            $stmt->bindParam(':email_empresa', $this->email_empresa);
            $stmt->bindParam(':cnpj_empresa', $this->cnpj_empresa);
            $stmt->bindParam(':senha_empresa', $this->senha_empresa);
            $stmt->bindParam(':telefone_empresa', $this->telefone_empresa);

            if ($stmt->execute()) {
                echo "Empresa inserida com sucesso!<br>";
            } else {
                echo "Erro ao inserir Empresa!<br>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    // Login de empresa
    public function logar()
    {
        $sql = "SELECT id_empresa FROM empresa WHERE email_empresa = :email AND senha_empresa = :senha";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $this->email_empresa);
        $stmt->bindParam(':senha', $this->senha_empresa);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            $_SESSION['logado'] = true;
            // header('location: index.php');
        } else {
            echo "Email ou Senha incorreto!";
        }
    }
}
