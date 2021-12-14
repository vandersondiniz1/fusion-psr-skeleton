
<p align="center">
  <img src="docs/img/logo.jpg" />
</p>

----------
# Dev branch 1.0
Projeto para criação de branches padronizadas

----------

>## Sumário

* [Informações Gerais](#informações-gerais)
* [Requisitos](#requisitos)
* [Configuração](#configuração)
* [Execução](#execução)
* [Estrutura de Diretórios](#estrutura-de-diretórios)
* [Variáveis de Ambiente](#variáveis-de-ambiente)

>## Informações Gerais
>Esse projeto foi desenvolvido para auxiliar os desenvolvedores da FusionDMS, na criação de branches git localmente. 

>## Requisitos
>Php   - versão 7.4

>## Configuração
>- Copiar a estrutura de diretórios para o lugar que achar adequado;
>- Ter um repositório git já clonado;
>- Criar um arquivo .env na raiz do projeto e configurar o Path direcionado para a raiz do repositório.

>## Execução
>php /src/core/app.php parâmetro número-da-eng nome-da-branch
> - Exemplo:php /src/core/app.php bug 666 master

>## Estrutura de Diretórios
>- `config` - Arquivos de configuração
>- `docs` - Deve conter imagens, sql e outros documentos
>- `docs/img` - Contém arquivos de imagem
>- `resources` - Diretório raiz para recursos extras
>- `resources/logs` - Contém os logs da aplicação
>- `src` - Núcleo dos arquivos de execução
>- `src/app/controller/` - Controladores do projetos
>- `src/app/core` - Contém o arquivo principal de execução
>- `src/app/utils` - Contém arquivos que controlam a estrutura de diretórios

>## Variáveis de Ambiente
>- `.env` - Variáveis de ambiente devem ser incluídas aqui

>Exemplo: PATH='C:\\Users\\Name\\Desktop\\Folder\\Repository\\repositoryname'

