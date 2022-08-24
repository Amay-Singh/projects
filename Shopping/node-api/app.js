const express = require('express');
var nodemailer = require('nodemailer');
const app = express();
app.use(express.json());


app.get('/getData', (req,res) => {
    res.json({
        "statusCode":200,
        "statusMessage":"Success"
    })
})

app.post('/sendMail', (req,res) => {
    console.log(req.body)

    var transporter = nodemailer.createTransport({
        host: 'smtp.zoho.in',
        port: 465	,
        auth: {
            user: 'testplasma@zohomail.in',
            pass: 'qwert@1234'
        }
    });
    var body = '<table><tr><th>Item Name</th><th>Description</th><th>Quantity</th><th>Price</th><th>Total</th></tr>';
    var subtotal = 0;
    req.body.forEach(item => {
        body = body.concat('<tr>')
       body = body.concat('<td>', item.name, '</td>')
       body = body.concat('<td>', item.description, '</td>')
       body = body.concat('<td>', item.quantity, '</td>')
       body = body.concat('<td> $', item.price, '</td>')
       body = body.concat('<td> $', item.quantity * item.price, '</td>')
       body = body.concat('</tr>')
       subtotal += item.price * item.quantity
    });
    var body =body.concat('</table><span>Subtotal:</span><span>$', subtotal, '</span>');
    console.log(body);

    var mailOptions = {
    from: 'testplasma@zohomail.in',
    to: 'testingplasam@gmail.com',
    subject: 'Sending Email using Node.js',
    html: body
    };

    transporter.sendMail(mailOptions, function(error, info){
    if (error) {
        console.log(error);
    } else {
        console.log('Email sent: ' + info.response);
    }
    });
    res.json({
        "statusCode":200,
        "statusMessage":"Success"
    })
})

app.listen(8003, (req,res) => {
    console.log('Express API is running at 8003');
})