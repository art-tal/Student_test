<?php
/* ����� �� ��������� ���������� �� ����������, ������� �������� ����� �������� �����. ���� �� ����������, �� �� �� ������� */
//if (isset($_POST['data'])) {$data = $_POST['data'];}
// DEBUG
$data = "Test's Data";

/* ����� ���������� ������� ��� e-mail ����� */
$sender = "talanov_artem@ukr.net";
$recipient = "talanov_artem@ukr.net";

/* ����� ���������� ����, ������� ����� ������������ � ���� ������ */
$sub = "��� ��������� � ����� ����� testeconomy.info";

/* � ����� ������������ ��� ����� ���������, ������� ����� ��� ���������. ���� ��� ���������� ������ ����� ������ ���������� ��������� \n */
$mes = "\n���� ��������! ��������/�����������... \n\n������ �����: \n$data";

/* � ��� �������, ��� ��� ���������� ��������� ������ �� ��������� ���� ����� */
{
    $send = mail ($recipient,$sub,$mes,"Content-type:text/plain; charset = windows-1251\r\nFrom:$sender");
    if ($send == 'true')
    {
        echo ('<p style="color: green">Send message!</p>');
        $_POST['name'] = $_POST['email'] = $_POST['message'] = '';
    }
    else
    {
        echo ('<p style="color: red">Error!</p>');
        $_POST['name'] = $_POST['email'] = $_POST['message'] = '';
    }
}
?>
