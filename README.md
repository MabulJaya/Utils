# Utils
* __SingleCLickListener__<br/>
  An abstract class to prevent click more than once within a certain time interval<br/>
  __Example__
  ```
  txtEdan.setOnClickListener(new SingleClickListener() {
                @Override
                public void onSingleClick(View v) {
                    Intent intent;
                    intent = new Intent(getContext(), UserActivity.class);
                    intent.putExtra("username",username);
                    intent.putExtra("adrs", adrs);
                    getContext().startActivity(intent);
                }
            });
  ```
