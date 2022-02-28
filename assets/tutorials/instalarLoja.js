export default {
    tutorial_title: 'Instalação loja Magento no Docker para versões 2.4.2+',
    sub_title: 'Siga os passos abaixo para a instalação:',
    yt_link: 'h5nwnsiN_Hw',
    steps: [
        new step('<a>Pesquisa no git da Tezus o Docker Magento</a>',  { 'yt-timestamp': "0" }, 'https://github.com/tezusecommerce/docker-magento'),
        new step('Copia a URL', { 'url-copy': "https://github.com/tezusecommerce/docker-magento",  'yt-timestamp': "14" }),
        new step('No terminal:', null, null, true),
        new step('Acessa a pasta onde as Lojas ficarão salvas usando o comando "cd"', { 'yt-timestamp': "120", 'yt-timestamp': "21" }),
        new step('<pre>git clone "colar URL copiada" "NomeLoja"</pre>',  { 'yt-timestamp': "28" }),
        new step('Acessa a pasta "NomeLoja"<pre>cd "NomeLoja"</pre><pre>sudo mkdir .vscode</pre><pre>sudo rm -r .git</pre>',  { 'yt-timestamp': "45" }),
        new step('Baixe a versão para iniciar a instalação do docker<pre>bin/download "número da versão"</pre>Insira suas chaves Magento quando solicitado',  { 'yt-timestamp': "67" }),
        new step('Rode a instalação do docker<pre>bin/setup docker.tezus</pre>Informe as chaves Magento novamente no fim do setup',  { 'yt-timestamp': "122" }),
        new step('Ao fim do setup desabilite o módulo Magento_TwoFactorAuth<pre>bin/magento module:disable Magento_TwoFactorAuth</pre><pre>bin/magento setup:di:compile</pre>',  { 'yt-timestamp': "178" }),
        new step('Em seguida acesse a loja no navegador:<a>https://docker.tezus</a>',  { 'yt-timestamp': "214" }, 'https://docker.tezus'),
    ]
}

function step(text, attributes, link, removeCardEffect) {
    this.text = text;
    this.attributes = attributes;
    this.link = link;
    this.removeCardEffect = removeCardEffect;
}
