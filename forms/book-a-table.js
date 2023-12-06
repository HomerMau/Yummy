function enviarWhatsApp() {
  // Pega os valores dos campos do formulário e codifica para URL
  var nome = encodeURIComponent(document.getElementById("nome").value)
  var email = encodeURIComponent(document.getElementById("email").value)
  var telefone = encodeURIComponent(document.getElementById("telefone").value)
  var assunto = encodeURIComponent(document.getElementById("assunto").value)
  var mensagem = encodeURIComponent(document.getElementById("mensagem").value)

  // Número de telefone no formato internacional (por exemplo, +5511972930448)
  var numeroTelefone = "+5511972930448"

  // Abre o link do WhatsApp no celular com a mensagem pré-preenchida
  var mensagemWhatsApp = `Nome:${nome}%0AE-mail:${email}%0ATelefone:${telefone}%0AAssunto:${assunto}%0AMensagem:${mensagem}`

  // Check if required fields are filled
  if (nome && email && telefone && assunto && mensagem) {
    window.location.href = `https://wa.me/${numeroTelefone}?text=${mensagemWhatsApp}`
  } else {
    alert("Por favor, preencha todos os campos obrigatórios.")
  }
}
