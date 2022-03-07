<?php

class Mock_Handler extends Db_Helper implements Db_Handler
{

    function __construct()
    {
        $this->mockData = [
            array('tutorial_id' => 1, 'tutorial_content' => '{"tutorial_title":"Instalação loja Magento no Docker para versões 2.4.2+","sub_title":"Siga os passos abaixo para a instalação:","yt_link":"h5nwnsiN_Hw","steps":[{"text":"<a>Pesquisa no git da Tezus o Docker Magento</a>","attributes":{"yt-timestamp":"0"},"link":"https://github.com/tezusecommerce/docker-magento"},{"text":"Copia a URL","attributes":{"url-copy":"https://github.com/tezusecommerce/docker-magento","yt-timestamp":"14"}},{"text":"No terminal:","attributes":null,"link":null,"removeCardEffect":true},{"text":"Acessa a pasta onde as Lojas ficarão salvas usando o comando \\"cd\\"","attributes":{"yt-timestamp":"21"}},{"text":"<pre>git clone \\"colar URL copiada\\" \\"NomeLoja\\"</pre>","attributes":{"yt-timestamp":"28"}},{"text":"Acessa a pasta \\"NomeLoja\\"<pre>cd \\"NomeLoja\\"</pre><pre>sudo mkdir .vscode</pre><pre>sudo rm -r .git</pre>","attributes":{"yt-timestamp":"45"}},{"text":"Baixe a versão para iniciar a instalação do docker<pre>bin/download \\"número da versão\\"</pre>Insira suas chaves Magento quando solicitado","attributes":{"yt-timestamp":"67"}},{"text":"Rode a instalação do docker<pre>bin/setup docker.tezus</pre>Informe as chaves Magento novamente no fim do setup","attributes":{"yt-timestamp":"122"}},{"text":"Ao fim do setup desabilite o módulo Magento_TwoFactorAuth<pre>bin/magento module:disable Magento_TwoFactorAuth</pre><pre>bin/magento setup:di:compile</pre>","attributes":{"yt-timestamp":"178"}},{"text":"Em seguida acesse a loja no navegador:<a>https://docker.tezus</a>","attributes":{"yt-timestamp":"214"},"link":"https://docker.tezus"}]}'),
            array('tutorial_id' => 2, 'tutorial_content' => '{"tutorial_title":"Vínculo de repositório Git do tema pelo VSCode","sub_title":"Passo a passo de como fazer o vínculo do VScode com o Git:","yt_link":"IG9-zBS5Uyg","steps":[{"text":"Iniciando no terminal com os seguintes comandos:","attributes":null,"link":null,"removeCardEffect":true},{"text":"<pre>sudo rm -r code (para excluir a pasta code) </pre>"},{"text":"<pre>Dar o mesmo comando para excluir a pasta design</pre>"},{"text":"<pre>No VScode abrir a pasta da loja e dentro dela, abrir a src/app</pre>"},{"text":"<pre>Dar o comando no terminal git init dentro da pasta /app da loja</pre>"},{"text":"Ainda no VScode:","attributes":null,"link":null,"removeCardEffect":true},{"text":"Acessar a 3ª view"},{"text":"Clicar nos 3 pontinhos (...)"},{"text":"Remote"},{"text":"Adicionar"},{"text":"Copiar a URL do repositório da loja no Git"},{"text":"Colar essa URL na aba que foi aberta no VScode"},{"text":"Nomear"},{"text":"Importante: Antes do próximo passo faça uma cópia da sua pasta /etc em algum lugar fora do diretório"},{"text":"Ainda na 3ª view, desfazer as mudanças"},{"text":"Acessar a branch indicada e cria sua própria branch para fazer as alterações"},{"text":"No terminal, voltar paa a pasta raiz da loja","attributes":null,"link":null,"removeCardEffect":true},{"text":"Dar o comando: <pre>bin/restart</pre>Para iniciar a loja"},{"text":"Por fim, dar o comando: <pre>bin/magento c:c (para limpar o cash)</pre>"}]}')
        ];
    }

    function getContentById($id)
    {
        foreach ($this->mockData as $mock) {
            if ($mock['tutorial_id'] == $id) return $mock['tutorial_content'];
        }
    }

    function getAllTutorials()
    {
        return $this->prepareTutorialListData($this->mockData);
    }

    function findUserById($id){
        return $this->findUserById($id);
    }

    function findUser($name, $password)
    {
        
    }

    function saveSessionId($id, $session_id)
    {
        
    }
}
