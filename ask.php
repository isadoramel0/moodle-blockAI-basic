<?php
require_once('../../config.php');
require_login();

$pergunta = required_param('pergunta', PARAM_TEXT);
require_sesskey();

require_once(__DIR__ . '/api.php');
$apikey = GEMINI_API_KEY;

$url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . $apikey;

$data = json_encode([
    'contents' => [['parts' => [['text' => $pergunta]]]]
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$resposta = $result['candidates'][0]['content']['parts'][0]['text'] ?? 'Erro ao obter resposta.';

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/blocks/iabloco/ask.php');
$PAGE->set_title('Resposta da IA');
echo $OUTPUT->header();
echo '<h3>Sua pergunta:</h3><p>' . format_text($pergunta) . '</p>';
echo '<h3>Resposta da IA:</h3><p>' . format_text($resposta) . '</p>';
echo '<a href="javascript:history.back()">Voltar</a>';
echo $OUTPUT->footer();