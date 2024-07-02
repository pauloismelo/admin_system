<!--#include file="db.asp"--><%
Response.Charset="ISO-8859-1"
 Response.CacheControl = "no-cache" 
 Response.Expires = -1 
AbreConexao%>
<%
idcategoria=request("idcategoria")

'response.Write("["&empresa&"]")
'IF idcor="" then
'idcor=0
'end if

SQL="select * from TBSUBCATEGORIA where id_categoria="&idcategoria&" order by subcategoria asc"


'response.Write(empresa)
'response.Write(SQL)
'response.Write(SQL2)
set con=conexao.execute(SQL)%>
		<label class="form-label">SubCategoria</label>
		<select name="subcategoria" class="form-control" required>
		
		<%if con.eof  then%>
        	<option value="0"> Sem categoria</option>
		<%else
		while not con.eof%>
			<option value="<%=con("id")%>"> <%=server.HTMLEncode(con("subcategoria"))%> </option>
		<%con.movenext
		wend
		end if%>
		</select>
<%set con=nothing

FechaConexao%>