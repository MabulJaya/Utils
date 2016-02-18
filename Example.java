
public class Example{

	public Example() {
    }	

	txtEdan.setOnClickListener(new SingleClickListener() {
        @Override
        public void onSingleClick(View v) {
        	Intent intent;
            intent = new Intent(getContext(), UserActivity.class);
            intent.putExtra("userName",groupName);
            intent.putExtra("userId", groupId);
            getContext().startActivity(intent);
     	}
     });
	
}

