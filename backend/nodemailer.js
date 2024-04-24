const nodemailer = require('nodemailer');

// Configurar o transporte
let transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
        user: 'seuemail@gmail.com', // Seu endereço de e-mail
        pass: 'suasenha' // Sua senha de e-mail
    }
});

// Definir as opções de e-mail
let mailOptions = {
    from: 'seuemail@gmail.com', // Remetente
    to: 'emaildodono@exemplo.com', // Destinatário
    subject: 'Assunto do E-mail',
    text: 'Conteúdo do E-mail' // Texto do e-mail
};

// Enviar o e-mail
transporter.sendMail(mailOptions, function(error, info){
    if (error) {
        console.log(error);
    } else {
        console.log('E-mail enviado: ' + info.response);
    }
});