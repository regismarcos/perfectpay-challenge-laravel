<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Pequeno projeto feito em Laravel

Este projeto é um teste de uso da biblioteca [MercadoPago](https://www.mercadopago.com.br/developers/pt/reference) . 

A intenção deste projeto é exemplificar o uso de alguns conceitos de padrões de projeto, uso da linguagem PHP 8 e
de Laravel 10.

## Conceitos utilizados

- A organização do projeto seguiu o padrão Laravel: Os principais artefatos do projeto foram criados mediante o uso
 do orquestrador em linha de comando Artisan.
- Servies utilizam Provider: Feito o bind dos Services através de Providers dedicados.
- Services utilizam factory: Os services existentes são instanciados através do Service Container do Laravel para que
seja possível utilizar a injeção de dependencia e caso seja necessário alterar algum construtor ter baixo impacto 
em manutenção. A intenção era mostrar (ainda que grosseiramente), como incluir uma dependencia externa (MercadoPago)
como um elemento que pode ser substituído sem impactar em outras partes do sistema.
- Utilizado elementos especificos de PHP 8 (Enum type, Class constructor property promotion, Named parameter)
- Utilizado capacidade multi-lingua, validação de parametros de requisição
- 


  
## Instalação
Para fazer a instalação é necessário clonar o repositório em um ambiente com o composer e PHP 8.2

- Clonar este repositório. Exemplo `git clone https://github.com/regismarcos/perfectpay-challenge-laravel.git`
- instalar as dependencias com `composer install -W`
- criar o arquivo .env a partir de .env-example e preencher os atributos necessários
- inicializar a aplicação Laravel com `php artisan generate:key`
- iniciar um servidor Web, PHP server (`php -S myproject:8080`) ou Laravel Server (`php artisan serve`).

### Testando a aplicação

A aplicação somente fará pagamentos com sucesso para os meios de pagamento Boleto e Cartão de Crédito Mastercard.
Todos os demais meios serão tratados como inválidos para exemplificar o uso de validadores, session flashes, etc.

Há testes unitários para serem executados através de `composer test`
