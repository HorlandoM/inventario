<script>
    function validar()
    {
        var id=document.f1.user.value;
        var ps=document.f1.pass.value;
        if(id.length==""&&ps.length=="")
        {
            alert("ingrese nombre de usuario y password");
            return false;
        }else
        {
        if(id.length=="")
        {
            alert("ingrese nombre de usuario");
            return false;
        }
        if(ps.length=="")
        {
            alert("ingrese password");
            return false;
        }
    }
}
</script>