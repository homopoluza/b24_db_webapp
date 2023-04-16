terraform {
  required_providers {
    aws = {
      source = "hashicorp/aws"
    }
  }
}

provider "aws" {
  profile = "default"
}

resource "tls_private_key" "test_server_key" {
  algorithm = "RSA"
  rsa_bits = 4096
}

resource "aws_key_pair" "public_key" {
  key_name   = "ssh-key"
  public_key = tls_private_key.test_server_key.public_key_openssh
}

resource "aws_instance" "test_server" {
  ami           = "ami-064087b8d355e9051" # Ubuntu
  instance_type = "t3.micro"
  key_name   = "ssh-key"
  vpc_security_group_ids = [aws_security_group.allow_ssh.id]
  tags = {
    Name = "test-server"
  }

  # provisioner "local-exec" {
  #   command = "ansible-playbook -T 180 -i '${aws_instance.test_server.public_ip},' playbook.yml --private-key=/home/homopoluza/.ssh/aws.pem"
  #   working_dir = "../ansible"
  #   environment = {
  #     ANSIBLE_HOST_KEY_CHECKING = "False"
  #   }
  #   when = create
  # }
}
