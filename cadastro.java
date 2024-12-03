import java.util.Scanner;

public class FormularioCompleto {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        String nome = "";
        String idade = "";
        String email = "";
        String senha = "";
        String cpf = "";
        String telefone = "";

        System.out.println("=== Preenchimento de Informações ===");

        // Solicitar o nome
        while (nome.isEmpty()) {
            System.out.print("Digite seu nome: ");
            nome = scanner.nextLine();
            if (nome.isEmpty()) {
                System.out.println("O nome não pode estar vazio. Tente novamente.");
            }
        }

        // Solicitar a idade
        while (idade.isEmpty()) {
            System.out.print("Digite sua idade: ");
            idade = scanner.nextLine();
            if (idade.isEmpty()) {
                System.out.println("A idade não pode estar vazia. Tente novamente.");
            } else {
                try {
                    Integer.parseInt(idade); // Verifica se é um número válido
                } catch (NumberFormatException e) {
                    System.out.println("A idade deve ser um número. Tente novamente.");
                    idade = ""; // Limpa o campo para forçar nova entrada
                }
            }
        }

        // Solicitar o e-mail
        while (email.isEmpty()) {
            System.out.print("Digite seu e-mail: ");
            email = scanner.nextLine();
            if (email.isEmpty()) {
                System.out.println("O e-mail não pode estar vazio. Tente novamente.");
            } else if (!email.contains("@") || !email.contains(".")) {
                System.out.println("E-mail inválido. Tente novamente.");
                email = ""; // Limpa o campo para forçar nova entrada
            }
        }

        // Solicitar o CPF
        while (cpf.isEmpty()) {
            System.out.print("Digite seu CPF (apenas números): ");
            cpf = scanner.nextLine();
            if (cpf.isEmpty()) {
                System.out.println("O CPF não pode estar vazio. Tente novamente.");
            } else if (cpf.length() != 11 || !cpf.matches("\\d+")) {
                System.out.println("CPF inválido. Deve conter 11 dígitos numéricos. Tente novamente.");
                cpf = ""; // Limpa o campo para forçar nova entrada
            }
        }

        // Solicitar o telefone
        while (telefone.isEmpty()) {
            System.out.print("Digite seu telefone (apenas números com DDD): ");
            telefone = scanner.nextLine();
            if (telefone.isEmpty()) {
                System.out.println("O telefone não pode estar vazio. Tente novamente.");
            } else if (telefone.length() < 10 || !telefone.matches("\\d+")) {
                System.out.println("Telefone inválido. Deve conter pelo menos 10 dígitos. Tente novamente.");
                telefone = ""; // Limpa o campo para forçar nova entrada
            }
        }

        // Solicitar a senha
        while (senha.isEmpty()) {
            System.out.print("Digite sua senha: ");
            senha = scanner.nextLine();
            if (senha.isEmpty()) {
                System.out.println("A senha não pode estar vazia. Tente novamente.");
            } else if (senha.length() < 6) {
                System.out.println("A senha deve ter pelo menos 6 caracteres. Tente novamente.");
                senha = ""; // Limpa o campo para forçar nova entrada
            }
        }

        // Mensagem final
        System.out.println("\nInformações preenchidas com sucesso!");
        System.out.println("Nome: " + nome);
        System.out.println("Idade: " + idade);
        System.out.println("E-mail: " + email);
        System.out.println("CPF: " + cpf);
        System.out.println("Telefone: " + telefone);
        // Por segurança, a senha não é exibida.

        scanner.close();
    }
}
