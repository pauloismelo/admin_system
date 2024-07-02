<%Response.ContentType="application/vnd.ms-excel"
response.AddHeader "content-disposition", "filename=mailling.xls"%>

<!--#include file="db.asp"-->

<%AbreConexao
set rs=conexao.execute("select * from TB_NEWSLETTER order by email asc")
if not rs.eof then%>
<table width="100%" border="0">
  <%while not rs.eof%>
  <tr>
    <td><%=rs("email")%></td>
  </tr>
  <%rs.movenext
  wend%>
</table>

<%end if%>