package com.hangga.research;

import android.os.SystemClock;
import android.view.View;

import java.util.Map;
import java.util.WeakHashMap;

/**
 * Created by hangga on 18/02/16.
 */
public abstract class SingleClickListener implements View.OnClickListener {

    private final long minimumInterval;
    private Map<View, Long> lastClickMap;

    /**
     * Implement this in your subclass instead of onClick
     * @param v The view that was clicked
     */
    public abstract void onSingleClick(View v);

    /**
     * The one and only constructor
     * @param minimumIntervalMsec The minimum allowed time between clicks - any click sooner than this after a previous click will be rejected
     */
    public SingleClickListener(long minimumIntervalMsec) {
        this.minimumInterval = minimumIntervalMsec;
        this.lastClickMap = new WeakHashMap<View, Long>();
    }

    public SingleClickListener() {
        this.minimumInterval = 2000; // 2 second
        this.lastClickMap = new WeakHashMap<View, Long>();
    }

    @Override public void onClick(View clickedView) {
        Long previousClickTimestamp = lastClickMap.get(clickedView);
        long currentTimestamp = SystemClock.uptimeMillis();

        lastClickMap.put(clickedView, currentTimestamp);
        if(previousClickTimestamp == null || (currentTimestamp - previousClickTimestamp.longValue() > minimumInterval)) {
            onSingleClick(clickedView);
        }
    }
}
