<!--#include file="inc_upload.asp"--> 
<!--#include file="db.asp"--> 

<%
Response.Expires=0 
Response.Buffer = TRUE 
Response.Clear 
byteCount = Request.TotalBytes 
RequestBin = Request.BinaryRead(byteCount) 
Dim UploadRequest 
Set UploadRequest = CreateObject("Scripting.Dictionary") 
BuildUploadRequest RequestBin 
%> 
<%AbreConexao
ContentType = UploadRequest.Item("foto").Item("ContentType")
'response.Write(ContentType)
if ContentType<>"image/jpeg" and ContentType<>"image/png" and ContentType<>"image/jpg" then
	ip=request.ServerVariables("REMOTE_ADDR")
	
	sch = "http://schemas.microsoft.com/cdo/configuration/"
	Set cdoConfig = Server.CreateObject("CDO.Configuration")
	servidor_smtp = "mail.stefanostore.com.br"'"189.113.170.1" 
	email_autentica = "noreply@stefanostore.com.br" 
	senha_autentica = "1i1Xw9u~" 
	cdoConfig.Fields.Item(sch & "sendusing") = 2
	cdoConfig.Fields.Item(sch & "smtpauthenticate") = 1
	cdoConfig.Fields.Item(sch & "smtpserver") = servidor_smtp
	cdoConfig.Fields.Item(sch & "smtpserverport") = 25
	cdoConfig.Fields.Item(sch & "smtpconnectiontimeout") = 30
	cdoConfig.Fields.Item(sch & "sendusername") = email_autentica
	cdoConfig.Fields.Item(sch & "sendpassword") = senha_autentica
	cdoConfig.fields.update

	Set myMail=CreateObject("CDO.Message") 
	Set myMail.Configuration = cdoConfig
	myMail.Subject="TENTATIVA DE INVASAO"
	myMail.From="STEFANOSTORE <noreply@stefanostore.com.br>"
	myMail.To="pauloisaquecpd@hotmail.com"
	myMail.Bcc="contato@atualizarinformatica.com.br"
	myMail.HTMLBody="<body><center><table width=500 border=0 cellpadding=0 cellspacing=0><tr><td valign=top class=texto><br>Tentativa de subir arquivo com a extensao: "&ContentType&" no dia: "&date&" &agrave;s: "&time&"..<br><br>IP: "&ip&"<br><br><br></td></tr></table></center></body>" 
	myMail.Send 
	set myMail=nothing 
	Set cdoConfig = Nothing
	
	response.Write("<script>alert('IMPOSSIVEL PROSSEGUIR!!');</script>")
	response.Cookies("oss")("key")="0"
	response.Cookies("oss")("nomex")=""
	response.Cookies("oss")("idx")=""
	response.Cookies("oss")("loginx")=""
	response.Cookies("oss")("departamentox")=""
	Response.Write("<meta http-equiv=refresh content=0;URL=http://google.com>")
	
else

	categoria = Trim(UploadRequest.Item("categoria").Item("Value"))
	foto= Trim(UploadRequest.Item("foto").Item("Value"))
	
	'response.Write(caminho)
	'response.End()
	
	'--------------------------------------------------------------------------------------------
	if foto<>"" then
		ContentType = UploadRequest.Item("foto").Item("ContentType")
		filepathname = UploadRequest.Item("foto").Item("FileName")
		FileName = idexts&"_"&Right(filepathname, Len(filepathname) - InStrRev(filepathname, "\"))
		Value = UploadRequest.Item("foto").Item("Value")
		Set ScriptObject = Server.CreateObject("Scripting.FileSystemObject")
		numero1 = instrrev(Request.servervariables("Path_Info"), "/")
		var3 = left(Request.servervariables("Path_Info"),numero1)
		'response.Write(caminho&"\artigos\p_" & FileName)
		Set MyFile = ScriptObject.CreateTextFile(caminho&"\IMG_CATEGORIA\p_" & FileName)
		For i = 1 To LenB(Value)
		MyFile.Write Chr(AscB(MidB(Value, i, 1)))
		Next
		MyFile.Close
	end if
	
	
	If foto <>"" then
	fig_p="p_"&filename
	elseif figuras="" then
	fig_p="nenhum"
	end if
	
	
	
	
	
	
	Sql = "INSERT INTO TBCATEGORIA (categoria, arquivo, datareg)"
	Sql = Sql & "VALUES ('"&TrocaAssento(categoria)&"', '"&fig_p&"', '"&formataData(date)&"')"
	'response.Write(sql)
	'response.End()
	conexao.Execute(Sql)
	FechaConexao
	response.Write("<script>alert('Categoria gravada com sucesso!');</script>")
	response.Write("<script>window.location='categoria_list.asp';</script>")%>

<%end if%>
