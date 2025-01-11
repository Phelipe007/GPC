function modal() {

    Swal.fire({
        timer: 5000,
        icon: "error",
        title: "Oops...",
        showConfirmButton: true,
        confirmButtonColor: "#006400",
        text: "Por favor, preencha todos os campos",
    });

}
function verificacao() {

    if (!/^\d{11}$/.test(document.getElementById("telefone").value)) {
        Swal.fire({
            timer: 5000,
            icon: "Preencha o campo numero",
            title: "Oops...",
            showConfirmButton: true,
            confirmButtonColor: "#006400",
            text: "O número deve conter exatamente 11 dígitos.",
        });

    }
};
function calcularIdade(dataNascimento) {
    
    hoje = new Date();
  
    nascimento=new Date(document.getElementById("data_de_nascimento").value);
    
    idade = hoje.getFullYear() - nascimento.getFullYear();
    document.getElementById("idade").value=idade;
    const mesAtual = hoje.getMonth();
    const diaAtual = hoje.getDate();
    const mesNascimento = nascimento.getMonth();
    const diaNascimento = nascimento.getDate();

    if (mesAtual < mesNascimento || (mesAtual === mesNascimento && diaAtual < diaNascimento)) {
        idade--;
    }
    
    return idade;
}

