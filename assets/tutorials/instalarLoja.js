export default {
    tutorial_title: 'Instalação loja Magento no Docker para versões 2.4.2+',
    sub_title: 'Siga os passos abaixo para a instalação:',
    yt_link: 'IG9-zBS5Uyg',
    steps: [
        new step('<a>Pesquisa no git da Tezus o Docker Magento</a>', null, 'https://github.com/tezusecommerce/docker-magento'),
        new step('Copia a URL', { 'url-copy': "https://github.com/tezusecommerce/docker-magento" }),
        new step('No terminal:', null, null, true),
        new step('Acessa a pasta onde as Lojas ficarão salvas usando o comando "cd"', { 'yt-timestamp': "120" }),
        new step('<pre>git clone "colar URL copiada" "NomeLoja"</pre>'),
        new step('Acessa a pasta "NomeLoja"<pre>cd "NomeLoja"</pre><pre>sudo mkdir .vscode</pre><pre>sudo rm -r .git</pre>'),
        new step('Baixe a versão para iniciar a instalação do docker<pre>bin/download "número da versão"</pre><pre>Insira suas chaves Magento quando solicitado</pre>'),
        new step('Rode a instalação do docker<pre>bin/setup docker.tezus</pre>'),
        new step('Se for preciso dados na loja, baixa o módulo SampleData<pre>bin/magento sampledata:deploy</pre>Para ver quais módulos estão ativos ou desabilitados<pre>module:status</pre><pre>bin/magento module:enable --all (ativa todos os módulos)</pre>Desabilita o módulo TwoFactorAuth<pre>bin/magento module:disable Magento_TwoFactoAuth</pre>')
    ]
}

function step(text, attributes, link, removeCardEffect) {
    this.text = text;
    this.attributes = attributes;
    this.link = link;
    this.removeCardEffect = removeCardEffect;
}