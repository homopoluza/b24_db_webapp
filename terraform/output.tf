resource "local_file" "private_key" {
  content  = tls_private_key.test_server_key.private_key_pem
  filename = "/home/homopoluza/.ssh/aws.pem"
  file_permission = "0600"
}

locals {
  inventory = templatefile("${path.module}/inventory.tpl", {
    test_server = aws_instance.test_server.public_ip
  })
}

resource "local_file" "inventory" {
  content  = local.inventory
  filename = "${path.module}/inventory.ini"
  file_permission = "0644"

}

output "public_ip" {
  value = aws_instance.test_server.public_ip
}
