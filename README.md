# Sistema ID_Plate

## Introdução

Sistema de gerenciamento para os dados capturados da identificação de placas através de uma IA.

Pode se realizar cadastro de placas relacionado à cadastro de pessoas, e pode relacionar à um usuário


## Ações disponiveis

(BackLog3)Cadastro de Usuários;
Cadastro de Funcionários;
Cadastro de Placas;
Cadastro de eventos;
BackLog2)Cadastro de horários e quantidades de veículos disponíves.
Visualização de previsão de movimento.
Notificação via e-mail/SMS/push.
Consulta aos históricos da placa do carro.
(BackLog4)Relatório de movimentação no período.
(BackLog5)Relatório de usuários do sistema.
(BackLog6)Login de usuários.
Restauração de senha.


Projeto Futuro:

(BackLog1)Aviso de placas Roubadas, ou veículos com Documento atrasados.
(BackLog7)Relatório de veículos suspeitos.
(BackLog16)acesso á camera real-time.

## Instalação

Em uma pasta do seu computador, digitar no cmd =  git clone https://github.com/vongrafen/medicalSystem

OBS: "Irá fazer dowload do projeto"

DENTRO DA PASTA "medicalsystem" digitar = composer install
OBS: "Irá criar as pastas necessárias"

Se não tiver o banco de dados, Criar no mysql

Abrir o arquivo .env.example e substituir as linhas : DB_DATABASE=SUA_BASE_DE_DADOS /// DB_USERNAME=SEU_NOME_DE_USUARIO /// DB_PASSWORD=SUA_SENHA

Rodar o comando = php -r "copy('.env.example', '.env');"
Rodar o comando = php artisan key:generate
Rodar o comando = php artisan migrate --seed
Rodar o comando = php artisan serve

Para logar-se como ADMIN, acesse a url http://SEU_LOCAL_HOST/home

Login e senha padrão: 
*login:* admin 
*senha:*admin


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
