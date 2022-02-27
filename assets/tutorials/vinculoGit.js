export default {
    tutorial_title: 'Vínculo de repositório Git do tema pelo VSCode',
    sub_title: 'Passo a passo de como fazer o vínculo do VScode com o Git:',
    yt_link: 'IG9-zBS5Uyg',
    steps: [
        new step('Iniciando no terminal com os seguintes comandos:', null, null, true),
        new step('<pre>sudo rm -r code (para excluir a pasta code)</pre>'),
        new step('<pre>Dar o mesmo comando para excluir a pasta "design"</pre>'),
        new step('<pre>No VScode abrir a pasta da loja e dentro dela, abrir a src/app</pre>'),
        new step('<pre>Dar o comando no terminal "git init" dentro da pasta /app da loja</pre>'),
        new step('Ainda no VScode:', null, null, true),
        new step('Acessar a 3ª view'),
        new step('Clicar nos 3 pontinhos (...)'),
        new step('Remote'),
        new step('Adicionar'),
        new step('Copiar a URL do repositório da loja no Git'),
        new step('Colar essa URL na aba que foi aberta no VScode'),
        new step('Nomear'),
        new step('Importante: Antes do próximo passo faça uma cópia da sua pasta /etc em algum lugar fora do diretório'),
        new step('Ainda na 3ª view, desfazer as mudanças'),
        new step('Acessar a branch indicada e cria sua própria branch para fazer as alterações'),
        new step('No terminal, voltar paa a pasta raiz da loja', null, null, true),
        new step('Dar o comando: <pre>bin/restart</pre>Para iniciar a loja'),
        new step('Por fim, dar o comando: <pre>bin/magento c:c (para limpar o cash)</pre>')
    ]
}

function step(text, attributes, link, removeCardEffect) {
    this.text = text;
    this.attributes = attributes;
    this.link = link;
    this.removeCardEffect = removeCardEffect;
}