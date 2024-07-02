<!--#include file="inc_upload.asp"-->
<!--#include file="db.asp"-->

<%
AbreConexao

			Response.Buffer = TRUE 
			Response.Clear 
			byteCount = Request.TotalBytes
			RequestBin = Request.BinaryRead(byteCount)
			Set UploadRequest = CreateObject("Scripting.Dictionary")
			BuildUploadRequest RequestBin
			

			
'------------inicio edição ----------------------------

'if bytecount>1048576 then

    'tamanho=(bytecount/1024)
	'response.Write("Esse arquivo tem "&tamanho&"MB. O máximo permitido é 1024kb.")

'elseif bytecount=<1048576 then

ContentType = UploadRequest.Item("foto").Item("ContentType")
response.Write(ContentType)
if ContentType<>"image/jpeg" and ContentType<>"image/png" and ContentType<>"image/jpg" and Trim(UploadRequest.Item("foto").Item("Value"))<>"" then
	response.Write("<script>alert('IMPOSSIVEL PROSSEGUIR!!');</script>")
	response.Write("<script>window.location='http://google.com';</script>")
else

	ids = Trim(UploadRequest.Item("id").Item("Value"))
	categoria = Trim(UploadRequest.Item("categoria").Item("Value"))
	foto= Trim(UploadRequest.Item("foto").Item("Value"))
	home= Trim(UploadRequest.Item("home").Item("Value"))
	
	'------------fim edição----------------------------------
	
	If foto <> "" Then
				'Set fig = conexao.Execute("SELECT foto FROM TBCATEGORIA WHERE id = "&UploadRequest.Item("id").Item("Value")&"")
				ContentType = UploadRequest.Item("foto").Item("ContentType")
				filepathname = UploadRequest.Item("foto").Item("FileName")
				FileName = Right(filepathname, Len(filepathname) - InStrRev(filepathname, "\"))
				Value = UploadRequest.Item("foto").Item("Value")
				Set ScriptObject = Server.CreateObject("Scripting.FileSystemObject")
				numero1 = instrrev(Request.servervariables("Path_Info"), "/")
				var3 = left(Request.servervariables("Path_Info"),numero1)
				
				y=replace(FileName," ","")
				
				Set MyFile = ScriptObject.CreateTextFile(caminho&"\IMG_CATEGORIA\" & Y)
				For i = 1 To LenB(Value)
					MyFile.Write Chr(AscB(MidB(Value, i, 1)))
				Next
				MyFile.Close
	
				textozql_fig=", arquivo = '"&y&"'"
	ELSE
				textozql_fig=""	
	END IF
	

	
	
	'--------------------------------------------------------------------------------------------
				sql="Update TBCATEGORIA SET  categoria='"&TrocaAssento(categoria)&"', home='"&home&"' "&textozql_fig&" WHERE id = "&ids&""
				'response.Write(sql)
				'response.End()
				conexao.Execute(sql)
				
				FechaConexao
'	end if
	response.Write("<script>alert('Categoria atualizada com sucesso!');</script>")
	response.Write("<script>window.location='categoria_list.asp';</script>")
end if%>
