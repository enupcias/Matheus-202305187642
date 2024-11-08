function calcularTotal() {
    const numNoites = parseInt(document.getElementById('num_noites').value);
    const numHospedes = parseInt(document.getElementById('num_hospedes').value);
    const valorPorNoite = 100;
    const valorPorHospede = 100;

    if (numNoites && numHospedes) {
        const total = (numNoites * valorPorNoite) + (numHospedes * valorPorHospede);
        document.getElementById('total').value = `R$ ${total.toFixed(2)}`;
    } else {
        alert("Por favor, insira o número de noites e o número de hóspedes.");
    }
}

function mostrarPopup() {
    alert("O formulário foi enviado com sucesso!");
}

document.querySelector("form").addEventListener("submit", function(event) {
    const nome = document.getElementById('nome').value;
    if (nome.length < 3) {
        alert("O nome deve ter pelo menos 3 caracteres.");
        event.preventDefault();
    }
});
