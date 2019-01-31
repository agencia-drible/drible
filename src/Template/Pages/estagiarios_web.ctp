<main class="bd-masthead" id="content" role="main">
  <div class="container">

    <h1>Introdução à Web</h1>

    <p class="lead"> Nesta secção do Website, irás aprender os conceitos básicos do que se trabalha aqui na Drible e que programas se usa para criar, editar e finalizar websites.</p>

    <hr>

    <h1>Ferramentas Necessárias</h1>

    <h2>Atom</h2>

    <p class="lead">O Atom é um editor de texto, faz <a href="https://atom.io/"  target="_blank">download</a> dele, vamos utilizar esta ferramenta mais a frente. </p>

    <h3>O que é, para que serve e o que procurar num editor de texto?</h3>

    <p class="lead">Essencialmente, um editor de texto é um programa que te permite criar e editar variadas linguagens de programação.</p>

    <p class="lead"> Editores de texto são frequentemente equipados com sistemas operacionais ou pacotes de desenvolvimento de software, e pode ser usado para alterar arquivos de configuração e linguagem de programação de código fonte. </p>

    <ul>
      <li class="lead">Fácil de usar e navegar.</li>
      <li class="lead">Ferramenta de encontrar e mudar (para que possas uma mudar uma palavra no ficheiro inteiro sem muito esforço).</li>
      <li class="lead">Cortar, copiar e colar.</li>
      <li class="lead">Syntax highlighting (torna mais fácil ler o código e encontrar algum erro).</li>
      <li class="lead">Aparência Customizável (tal como mudar a fonte da letra, esquema de cores, etc., do teu editor).</li>
      <li class="lead">Extensibilidade (que forneça algum mecanismo de plugin, ou que seja programável , para que um programador possa costumizar o editor com características adicionais).</li>
    </ul>

    <hr>

    <h2>Git</h2>

    <h3>O que é um git?</h3>

    <p class="lead">Git é um tipo de sistema de controlo de versões que torna mais fácil monitorizar as alterações no ficheiro. Por exemplo, quando editas um ficheiro, git pode ajudar te a determinar exatamente oque mudou, quando mudou e porquê.</p>

    <p class="lead">É útil para coordenar trabalho entre múltiplas pessoas num projeto, e para monitorizar o progresso ao longo do tempo guardando “checkpoints”.</p>

    <p class="lead">Existe vários tipos de alojamento online tais como o <a href="https://github.com/"  target="_blank">GitHub</a> e o <a href="https://bitbucket.org/" target="_blank">BitBucket</a>.</p>

    <hr>

    <h3>Compreender o git?</h3>

    <p class="lead">Git usa muita analogias relacionadas com “árvores”. Pensa na código principal como se fosse o tronco de uma árvore 🎄.</p>

    <p class="lead">Sempre que adicionares mais alterações (commits), o teu tronco fica maior. Mesmo que apagues o código, ainda é considerado uma mudança e isso faz com que o tronco cresça. É como a ferramenta “undo” [desfazer] funciona num editor de texto (tipo o Word), salva todas as alterações, incluindo o apagar.</p>

    <p class="lead">Pode andar para cima e para baixo no tronco — equivalente a andar para a frente e para trás no tempo — por verificar os tais “checkpoints” específicos.</p>

    <hr>

    <h3>O que é branching?</h3>

    <p class="lead">Muito dos projetos têm uma acumulação de características novas para adicionar e bugs para arranjar. Quando te queres dirigir a um destes problemas, uma maneira seria aumentar a árvore e comprometer-se diretamente ao tronco. Isto funciona perfeitamente para projetos pequenos ou projetos onde és a única pessoa a fazer alterações, mas e se múltiplas pessoas estiverem a trabalhar ao mesmo tempo? É muito fácil atrapalharmo-nos e acabar por dar conflitos de alterações.</p>

    <p class="lead">A solução é branching (ramificar). Em vez de te comprometeres ao tronco, crias o teu próprio ramo e trabalhas a partir daí. Assim tornas o ramo maior em vez do tronco.</p>

    <p class="lead">Ao visualizar ramos, normalmente eles são desenhados lateralmente para ocupar menos espaço. Imagina que o seguinte é uma árvore, tombada, com as raízes á esquerda. Cada círculo é uma alteração. Quanto mais para a direita o círculo é, mais recentemente foi alterado:</p>

    <img src="/img/branching_exemplo1.png" alt="Branching">

    <p class="lead"> Legenda: Trunk = tronco / Branch = ramo / Root = raíz </p>

    <p class="lead">Existe um tronco azul e um ramo verde. Existe várias alterações em ambos, mostrado cronologicamente da esquerda para a direita. O teu ramo começa no 2º tronco (Trunk #2). Enquanto trabalhas no teu ramo [ alterações no 1º e 2º ramo ( Branch #1 e Branch #2 )], alguém trabalhou diretamente no tronco [ alterações no 3º e 4º tronco ( Trunk #3 e Trunk #4 )]. Essas alterações ainda não afetaram o teu ramo ainda, o teu ramo está desatualizado.</p>

    <hr>

    <h2>Submeter as alterações?</h2>

    <p class="lead"> Agora tens as tuas alterações num ramo e o teu objetivo é eventualmente voltar a passar-los para o tronco como parte da “oficial” código base.</p>

    <p class="lead"> Uma vez que testado as tuas alterações, precisarás de a partilhar com a tua “equipa”. Isto é feito através de um Pull Request (PR) ou um Merge Request (MR) — são a mesma coisa, o termo apenas depende de que software estás a usar (exemplo: GitHub). Estás a pedir que as tuas alterações sejam alteradas e convergidas com o código base.</p>

    <img src="/img/branching_exemplo2.png" alt="Commiting">

    <p class="lead">Legenda: Trunk = tronco / Branch = ramo / Root = raíz / Merge = convergir </p>

    <hr>

    <h2>Como obter o GitHub?</h2>

    <p class="lead"><a href="https://desktop.github.com/" target="_blank">GitHub Desktop</a> (para Windows e Mac)</p>

    <p class="lead">Agora vamos por isto tudo em prática. Clica <a href="/estagiarios/web/hellodrible" target="_blank">aqui</a>.</p>

    <hr>

    <h2> Como criar um novo repositório no git usando as linhas de comando. </h2>

    <p class="lead"> Como primeiro instinto, quando se começa algo novo, devemos usar <code> git init</code>.

      <hr>
      <h2>Repositórios</h2>
      <h2> Criar um repositório do zero: </h2>
      <ul>
        <li class="lead"> Criar um diretório para conter o projecto </li>
        <li class="lead"> Entre no novo diretório</li>
        <li class="lead"> Escreva <code> git init </code></li>
        <li class="lead"> Escreva <code> git add README.md </code></li>
        <li class="lead"> Escreva <code> git commit -m "first commit" </code></li>
        <li class="lead"> Escreva <code>git remote add origin git@github.com:alexpchin/<"reponame">.git</code></li>
        <li class="lead"> Escreva <code>git push -u origin master</code></li>
      </ul>
      <p class="lead">O primeiro arquivo para criar (e adicionar e confirmar) é provavelmente um arquivo ReadMe, seja como texto simples ou com <a href="https://daringfireball.net/projects/markdown/">Markdown</a> , descrevendo o projeto .</p>
      <p class="lead">O Markdown permite que você adicione um pouco de marcação de texto, como <a href="https://en.wikipedia.org/wiki/Hyperlink">hiperlinks</a> , <strong>negrito</strong> / <i>itálico</i> , ou para indicar o código com um <code>monospace</code> font. O Markdown é facilmente convertido para html para visualização em um navegador da web, e o GitHub fará isso automaticamente. </p>
      <hr>
      <h2>Criar um repositório para um projeto existente: </h2>
      <ul>
        <li class="lead"> Selecione o diretório que contém o projeto</li>
        <li class="lead"> Escreva <code>git init</code></li>
        <li class="lead"> Escreva <code>git add</code> para adicionar todos os arquivos relevantes</li>
        <li class="lead"> Provavelmente desejará criar um <code>.gitignore</code> arquivo imediatamente, para indicar todos os arquivos que não deseja localizar. Use <code>git add .gitignore</code> também</li>
        <li class="lead"> Escreva <code> git commit </code></li>
      </ul>
        <hr>
        <h2>Liga-o ao github</h2>
        <p class="lead">Agora que já tens um repositório local do git, já o podes usar assim que quiseres. Porém se quiseres ligar-te ao github, segue os seguintes passos: </p>
        <ul>
        <li class="lead"> Entra no <a href="https://github.com/">github</a></li>
        <li class="lead"> <a href="https://github.com/login">Entra</a> na tua conta ou <a href="https://github.com/join?source=login">regista-te</a></li>
        <li class="lead"> Clica no botão que diz "Novo repositório" no canto superior direito. Terás uma opção lá para inicializar o repositório com um arquivo README.</li>
        <li class="lead"> Clica no botão "Criar repositório"</li>
        </ul>
        <p class="lead">Agora, segue o segundo conjunto de instruções, "Enviar um repositório existente"</p>
        <code>$ git remote add origin git@github.com:username/new_repo
        </br>$ git push -u origin master
        </code>
        <p></p>
        <p class="lead">Na verdade, a primeira linha das instruções dirá</p>
        <code>$ git remote add origin https://github.com/username/new_repo </code>
        <p class="lead">Podes usar <code>it@github.com:username/new_repo</code> em vez de <code>https://github.com/username/new_repo</code>, como o primeiro é para uso com o <a href="https://en.wikipedia.org/wiki/Secure_Shell2">ssh</a> (se configurares o ssh como mencionei em <a href="https://kbroman.org/github_tutorial/pages/first_time.html">"Primeira vez"</a>, então não terás que escrever a tua password todas as vezes que tu "empurrares" as coisas para o github). Se usares a última construção, terás que escrever a tua password do github todas as vezes que tu pressionares o github.o</p>


        </div>
      </main>
