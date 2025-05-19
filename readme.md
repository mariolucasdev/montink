# Montink - Processos Seletivo

## 🏗️ Instalando o Projeto
Para instalar o projeto, siga os passos abaixo:

1. Clone o repositório:
```
git clone https://github.com/mariolucasdev/montink.git
```

2. Acesse o diretório do projeto:
```
cd montink
```

3. Libera as permissões de execução:
```
chmod +x ./install
```

4. Execute o script de instalação:
```
sh install
```

## 🕸️ Webhook de Pedidos

Para executar o webhook de pedidos, execute o seguinte comando:

```bash
curl -X POST http://0.0.0.0/webhook/pedidos \
    -H "Content-Type: application/json" \
    -d '{"orderId": "1", "status": "completed"}'
```

Observação: orderId deve ser um id de pedido existente e status deve ser um dos seguintes: "completed", "pending", "cancelled".
Caso o status para atualizar seja cancelled o pedido será excluído da base de dados.

## Tecnologias Usadas
* PHP 8.1 FPM
* Docker
* Docker Compose
* HTML, CSS, JavaScript, Bootstrap 4
* Codeigniter 3
* MySQL 5.6
