<form action="#" method="post" hidden id="approve_nid">
    @csrf
    <input type="hidden" name="member_id" value="{{$associationMember->id}}">
    <input type="hidden" name="action" value="Approved">
</form>
